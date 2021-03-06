<?php
/**
 +----------------------------------------------------------
 * 小恺教你写一个属于自己的MVC框架之控制器基类
 +----------------------------------------------------------
 * 文 件 名  Controller.php
 +----------------------------------------------------------
 * 作    者  xiaokai
 +----------------------------------------------------------
 * 时    间  2009-08-17
 +----------------------------------------------------------
 */

class Controller
{
    /**
     * 视图类实例
     *
     * @access protected
     * @var    object
     */
    protected $view = NULL;

	/**
	 * 构造方法, 实例化视图
	 *
	 * @access public
	 * @return void
	 */
    public function __construct()
    {
        $this->view = new View();
    }

	/**
	 * 设置模板变量
	 *
	 * @access public
     * @param  mixed  $var
     * @param  mixed  $value
	 * @return void
	 */
    public function assign($var, $value)
    {
        $this->view->assign($var, $value);
    }

	/**
	 * 显示模板
	 *
	 * @access public
     * @param  string  $file
	 * @return void
	 */
    public function display($file)
    {
        $this->view->display($file);
    }

    /**
     * 运行程序
     *
     * @access public
     * @return void
     */
	public function Run()
	{
		$this->Analysis();		//开始解析URL获得请求的控制器和方法
		$control = $_GET['c'];
		$action  = $_GET['a'];
		//这里构造出控制器文件的路径
		$controlFile = ROOT_PATH . '/Controllers/' . $control . '.class.php';
		if(!file_exists($controlFile)) //如果文件不存在提示错误, 否则引入
		{
			exit('控制器不存在' . $controlFile);
		}
		include($controlFile);
		$class = ucwords($control);	 //将控制器名称中的每个单词首字母大写,来当作控制器的类名
		if(!class_exists($class))    //判断类是否存在, 如果不存在提示错误
		{
			exit('为定义的控制器类' . $class);
		}
		$instance = new $class();	//否则创建实例
		if(!method_exists($instance, $action))	//判断实例$instance中是否存在$action方法, 不存在则提示错误
		{
			exit('不存在的方法' . $action);
		}
		$instance->$action();
	}

	/**
	 * 解析URL获得控制器与方法
	 *
	 * @access protected
	 * @return void
	 */
	protected function Analysis()
	{
		global $C;				//包含全局配置数组, 这个数组是在Config.ph文件中定义的
		if($C['URL_MODE'] == 1) //如果URL模式为1 那么就在GET中获取控制器, 也就是说url地址是这种的http://localhost/index.php?c=控制器&a=方法
		{
			$control = !empty($_GET['c']) ? trim($_GET['c']) : '';
			$action  = !empty($_GET['a']) ? trim($_GET['a']) : '';
		}
		else if($C['URL_MODE'] == 2) //如果为2 那么就是使用PATH_INFO模式, 也就是url地址是这样的 http://localhost/index.php/控制器/方法/其他参数
		{
			if(isset($_SERVER['PATH_INFO']))
			{
				//$_SERVER['PATH_INFO']URL地址中文件名后的路径信息, 不好理解, 来看看例子
				//比如你现在的URL是 http://www.php100.com/index.php 那么你的$_SERVER['PATH_INFO']就是空的
				//但是如果URL是 http://www.php100.com/index.php/abc/123
				//现在的$_SERVER['PATH_INFO']的值将会是 index.php文件名称后的内容 /abc/123/
				$path    = trim($_SERVER['PATH_INFO'], '/');
				$paths   = explode('/', $path);
				$control = array_shift($paths);
				$action  = array_shift($paths);
			}
		}
		//这里判断控制器的值是否为空, 如果是空的使用默认的
		$_GET['c'] = $control = !empty($control) ? $control : $C['DEFAULT_CONTROL'];
		//和上面一样
		$_GET['a'] = $action  = !empty($action)  ? $action  : $C['DEFAULT_ACTION'];
	}
}