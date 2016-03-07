小恺教你写一个属于自己的MVC框架

在开始之前需要同学们知道的知识

1.php基础知识
2.单一入口, 不知道的可以看看这里 (http://www.diybl.com/course/4_webprogram/php/phpshil/2008828/138395.html)

具备以上两点, 那我们就可以开始啦. 哈哈!

先来说一下程序的执行流程

首先有个入口文件, 然后初始化一些程序, 之后根据请求调用不同的类和方法

首先我们弄一个入口文件 Index.php 来看看代码

<?php
[php]
require "Init.php";

$control = new Controller();

$control->Run();
[/php]
?>

代码没什么特别的, 首先先引入Init.php文件 然后实例化一个类

然后调用该类的Run()方法 这里我们把这个类叫做控制器

既然引入了Init.php文件, 那么我们继续看看Init.php文件的源码
[php]
<?php

header("Content-type:text/html;charset=utf-8");	

!defined('ROOT_PATH') && define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)));

require ROOT_PATH  . '/Core/Config.php';				//引入配置文件

require ROOT_PATH . '/Core/Controller.class.php';		//引入控制器类文件

require ROOT_PATH . '/Core/View.class.php';				//视图类文件

require ROOT_PATH . '/Core/Model.class.php';			//模型类文件
?>
[/php]
分析一下代码, 如果你懂了, 可以略过这一步, 继续往下看哦.
首先 设置字符集, 然后判断如果没有定义常量"ROOT_PATH"那么就定义它
然后就是引入一些文件, 首先是配置文件, 控制器类文件, 视图类文件, 模型类文件
同理既然引入了文件,那么我们就打开文件看看代码, 先来看Config.php文件
[php]
<?php

$C = array(
	'URL_MODE'					=> 1,				//URL模式, 1普通模式, 2 PATH_INFO模式
	'DEFAULT_CONTROL'			=> 'welcome',		//默认调用的控制器
	'DEFAULT_ACTION'			=> 'index',			//默认执行的方法
);
?>
[/php]
没什么特别的就是一个数组, 有三个值, 暂时先这样, 以后有需要在来增加
那么好, 我们继续看Controll.class.php
[php]
<?php
class Controller 
{
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
?>
[/php]

注释写的很清楚, 这里我就不多说了, 做到这, 你就可以建立一个Controller目录, 然后在目录中建立welcome.class.php文件
写入如下内容
[php]
<?php
class Welcome
{
	public function index()
	{
		echo 'Hello';
	}
}
?>
[/php]
允许程序你将会看到Hello
然后在写一个方法
<?php
class Welcome
{
	public function index()
	{
		echo 'Hello';
	}
	
	public function show()
	{
		echo '方法名称Show';
	}
}
?>
[/php]
再次运行程序, 将url地址改为 
http://你的域名/index.php/welcome/show/
你会看到 '方法名称Show' 
好了, 看到这里我们的控制器其实已经弄得差不多了
今天先弄到这里
明天我们继续View.class.php 视图类文件, 和在welcome.class.php控制器中调用视图
