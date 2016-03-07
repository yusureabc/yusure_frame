上集说到控制器, 现在我来看看视图基类

[php]
<?php
class View
{

    protected $vars = array();

    protected function assign()
    {

    }

    protected function display()
    {

    }
}
?>
[/php]
是不是很熟悉这两个方法, 呵呵, 用来给模板设置变量和显示模板的. 和smarty一样, $vars属性是用来保持模板变量的数组, 我来写完它.
先看看assign方法
[php]
<?php
    public function assign($var, $value)
    {
        if(is_array($var))
        {
            $this->vars = array_merge($this->vars, $var);
        }
        else
        {
            $this->vars[$var] = $vaule;
        }
    }
?>
[/php]

很简单, 首先有两个参数 $var模板变量名称, $value对应的值
先判断$var是否是数组, 如果是那么将他于属性$vars合并
将$var当作下标$value当作值, 添加到属性$vars中
在来看display方法

[php]
<?php
    public function display($file)
    {
        include(ROOT_PATH . '/Core/Template.class.php');
        $this->template 					= Template::GetInstance();
		$this->template->templatePath 		= ROOT_PATH . '/Views/';
		$this->template->cache		 		= TRUE;
		$this->template->cachePath	 		= ROOT_PATH . '/Cache/';
		$this->template->cacheLifeTime 		= 1;
		$this->template->templateSuffix		= '.html';
		$this->template->leftTag			= '{';
		$this->template->rightTag			= '}';
        $templateFile                       = ROOT_PATH . '/Views/' . $file . '.html';
        if(!file_exists($templateFile))
        {
            exit('模板文件' . $file . '不存在');
        }
        $this->template->display($file, $this->vars);
    }
?>
[/php]

这个看上去有点多, 不着急我们慢慢解释

首先有一个参数 $file 模板文件名称, 不包括路径以及后缀

然后引入模板类, 设置模板的参数

先设置模板文件目录, 然后是否开启缓存, 然后缓存目录, 缓存有效时间, 模板文件后缀, 左右定界符

然后组合出模板文件路径 比如你传入的$file值是index 那么就是对应的模板文件就是  模板目录/index.html

然后判断模板文件是否存在, 不存在则提示错误

然后在调用模板类实例的display方法将模板文件名称, 和模板变量传入

这里这个模板类我就不多说了, 如果有兴趣的朋友可以下载附件查看, 类中有详细注视

这里既然设置了两个目录, 那么我们就去创建它, 在程序根目录下建立 Views 和 Cache 两个目录, 后面会用到

现在我们打开昨天写好的 Controller.class.php 控制器类 在里面加入一个属性 和 几个方法

[php]
<?php
    protected $view = NULL;

    public function __construct()
    {
        //实例化上面写到的视图类
        $this->view = new View();
    }


    public function assign($var, $value = '')
    {
        $this->view->assign($var, $value);
    }

    public function display($file)
    {
        $this->view->display($file);
    }
?>
[/php]

现在进入到Views目录中建立一个模板命名为index.html 内容如下
[php]
<html>
<head>
    <title>{$title}</title>
</head>
<body>
{$body}
</body>
</html>
[/php]

控制器类中也有assign方法, 他是调用构造函数中创建的view类实例的assign方法
也就是我们上面定义的那个 dispaly方法也一样
现在我们打开welcome.class.php文件, 修改index方法, 注意这里好要将Welcome类继承自Controller类

[php]
<?php
class Welcome extends Controller
{
	public function index()
	{
        $this->assign('title', 'Hello World');
        $this->assign('body', '小恺教你写一个属于自己的MVC框架');
        $this->display('index');
	}
}
?>
[/php]

现在你需要做的就是打开浏览器, 在地址栏中输入 http://yourdomain/Index.php 然后你将会看到 "小恺教你写一个属于自己的MVC框架"

如果出现了这行字, 那么恭喜你View层也搞定了, 明天我们继续 小恺教你写一个属于自己的MVC框架之模型

如果你没看懂这篇文章也可以联系 QQ 601200376  Email myxiaokai@gmail.com

最后希望大家多多支持... 哈哈

广告一下 Tomorrow Framework 0.1测试版 以经快完工了, 需要的朋友可以联系我, 注: 源文件有详细注视.

ThinkPHP 的 TopN() 方法, 和 模式于数据库表关联 CURD办自动