<?php
/**
 +----------------------------------------------------------
 * 小恺教你写一个属于自己的MVC框架之视图基类
 +----------------------------------------------------------
 * 文 件 名  Config.php
 +----------------------------------------------------------
 * 作    者  xiaokai
 +----------------------------------------------------------
 * 时    间  2009-08-19
 +----------------------------------------------------------
 */
class View
{
    /**
     * 模板变量
     *
     * @access protected
     * @var    array
     */
    protected $vars = array();


    /**
     * 模板引擎实例
     *
     * @access protected
     * @var    array
     */
    protected $template = NULL;

	/**
	 * 设置模板变量
	 *
	 * @access public
	 * @param  mixed  模板变量名
	 * @param  mixed  对应的值
	 * @return void
	 */
    public function assign($var, $value = '')
    {
        if(is_array($var))  //如果是数组, 那么将它合并到属性$vars中
        {
            $this->vars = array_merge($this->vars, $var);
        }
        else //否则将$var为下标$value为值, 增加到$vars中
        {
            $this->vars[$var] = $value;
        }
    }

	/**
	 * 显示模板
	 *
	 * @access public
	 * @param 	string $file 模板文件名, 不包括路径和后缀
	 * @return void
	 */
    public function display($file)
    {
        include(ROOT_PATH . '/Core/Template.class.php');    //引入模板类
        //设置相关信息
        $this->template 					= Template::GetInstance(); // GetInstance方法是获取模板类的实例
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
}