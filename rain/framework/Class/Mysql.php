<?php
defined('IN_FW') or die('deny');

/*
	only use in utf8, why do not use gbk please see http://blog.csdn.net/felio/article/details/1226569
*/
class Mysql
{
	private $conf = null;
	private $pdo = null;
	private $statement = null;
	private $lastInsID = null;
	private static $_instance = null;

	private function __clone()
	{
		die('Clone is not allow!');
	}

	private function __construct($conf = null)
	{
		if (!extension_loaded('pdo') || !extension_loaded('pdo_mysql'))
			die('open PDO and pdo_mysql first');

		if (version_compare(PHP_VERSION, '5.3.9', '<') && !in_array(PHP_OS, array('WINNT', 'WIN32', 'Windows', '')))
			die('to be safe, PDO need PHP_VERSION > 5.3.6 and PHP_VERSION 5.3.8 has hash bug, so need PHP_VERSION >= 5.3.9, you php version:'.PHP_VERSION);

		$this->conf = array(
			'dsn' => C('db-dsn'),
			'un' => C('db-un'),
			'pw' => C('db-pw'),
		);

		if (is_array($conf) && !empty($conf))
		{
			foreach ($conf as $k => $v)
			{
				if (!is_scalar($v) || !isset($this->conf[$k]))
				{
					unset($conf[$k]);
					continue;
				}
				$this->conf[$k] = $v;
			}
		}
	}

	public static function getInstance($conf = null)
	{
		if (!(self::$_instance instanceof self))
			self::$_instance = new self($conf);
		return self::$_instance;
	}

	public function connect()
	{
		if (!is_null($this->pdo))
			return $this->pdo;
		try {
			$this->pdo = new PDO($this->conf['dsn'], $this->conf['un'], $this->conf['pw'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_EMULATE_PREPARES => false));
		} catch (PDOException $e) {
			if (APP_DEBUG)
				throw new Exception($e->getMessage()); 
			die('new PDO  class error');
		}
	}


	public function free()
	{
		if (!is_null($this->statement))
		{
			$this->statement->closeCursor();
			$this->statement = null;
		}
	}

	public function query($sql, $data = array(), $one = false, $cache_type = 'm', $timeout = 7200)
	{
		if (!is_array($data))
			return false;

		if ($cache_type == 'm' && !extension_loaded('memcache'))
			$cache_type = 'f';

		if (is_null($this->pdo))
			$this->connect();
		$this->free();
		
		$this->statement = $this->pdo->prepare($sql);
		if (false === $this->statement)
		{
			if (APP_DEBUG)
			{
				echo '<pre>';
				print_r($this->pdo->errorInfo());
				echo '</pre>';
				throw new Exception('sql:'.$sql);
				die('execute sql error');
			}
			else
			{
				$arr = $this->pdo->errorInfo();
				//record log
				SL('sql error', '执行sql: '.$sql.' 发生错误，错误信息: '.$arr[2], 'sql预处理错误', 1);
			}
        }
		if (!empty($data))
		{
			foreach ($data as $k => $v)
			{
				$this->statement->bindValue($k, $v);
			}
		}
		if (!$this->statement->execute())
		{
			if (APP_DEBUG)
			{
				echo '<pre>';
				print_r($this->statement->errorInfo());
				echo '</pre>';
				throw new Exception('sql:'.$sql);
				die('execute sql error');
			}
			else
			{
				$arr = $this->statement->errorInfo();
				//record log
				SL('sql error', '执行sql: '.$sql.' 发生错误，错误信息: '.$arr[2], 'sql执行错误', 1);
			}
		}

		$GLOBALS['_SQLCount']++;

		if (preg_match("/^\s*(INSERT\s+INTO|REPLACE\s+INTO)\s+/i", $sql))
			$this->lastInsID = $this->getLastInsertId();
		else
			$this->lastInsID = null;

		if (!is_null($this->lastInsID))
			return $this->lastInsID;

		$key = 'a'.md5($sql);
		if ($one)
		{
			if (APP_NAME == 'admin' || !$cache)
				return $this->statement->fetch(PDO::FETCH_ASSOC);
			else
			{
				$cache = Cache::getInstance($cache_type, array('timeout' => $timeout));
				$ret = $cache->get($key);
				if ($ret)
				{
					$GLOBALS['_SQLCount']--;
					return $ret; 
				}
				$val = $this->statement->fetch(PDO::FETCH_ASSOC);
				$cache->set($key, $val, $timeout);
				return $val;
			}
		}
		else
		{
			if (APP_NAME == 'admin' || !$cache_type)
				return $this->statement->fetchAll(PDO::FETCH_ASSOC);
			else
			{
				$cache = Cache::getInstance($cache_type, array('timeout' => $timeout));
				$ret = $cache->get($key);
				if ($ret)
				{
					$GLOBALS['_SQLCount']--;
					return $ret; 
				}
				$val = $this->statement->fetchAll(PDO::FETCH_ASSOC);
				$cache->set($key, $val, $timeout);
				return $val;
			}
		}
	}

	public function getLastInsertId()
	{
		if (is_null($this->pdo))
			$this->connect();
		return $this->pdo->lastInsertId();
	}
}
