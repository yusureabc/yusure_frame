<?php
/**
 * 入口文件
 *
 * 统一入口，进行初始化信息
 *
 */
error_reporting(E_ALL & ~E_NOTICE);
define('BASE_ROOT_PATH',str_replace('\\','/',dirname(__FILE__)));

define('BASE_CORE_PATH',BASE_ROOT_PATH.'/core');
define('BASE_DATA_PATH',BASE_ROOT_PATH.'/data');
define('DS','/');
define('IN_B2B2C',true);
define('StartTime',microtime(true));
define('TIMESTAMP',time());

define('DIR_RESOURCE', 'data/resource');
define('DIR_UPLOAD',   'data/upload');