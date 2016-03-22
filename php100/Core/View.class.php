<?php

/**
 * 视图类
 */
class View 
{
    /**
     * 模板变量
     * @var array
     */
    protected $vars = array();

    /**
     * 模板引擎实例
     * @var null
     */
    protected $template = NULL;

    /**
     * 赋值到模板
     * @author Yusure  http://yusure.cn
     * @date   2016-03-04
     * @param  [param]
     * @param  [type]     $var   [description]
     * @param  [type]     $value [description]
     * @return [type]            [description]
     */
    public function assign( $var, $value )
    {
        if ( is_array( $var ) )
        {
            $this->vars = array_merge( $this->vars, $var );
        }
        else
        {
            $this->vars[ $var ] = $value;
        }
    }

    /**
     * 显示页面
     * @author Yusure  http://yusure.cn
     * @date   2016-03-04
     * @param  [param]
     * @return [type]     [description]
     */
    public function display( $file )
    {
        /* 1、引入模板类 */
        include ( ROOT_PATH . '/Core/Template.class.php' );
        /* 2、获得模板实例 */
        $this->template = Template::GetInstance();
        /* 3、设置模板目录 */
        $this->template->templatePath = ROOT_PATH . '/View/';
        /* 4、是否开启缓存 */
        $this->template->cache = TRUE;
        /* 5、设置缓存目录 */
        $this->template->cachePath = ROOT_PATH . '/Cache/';
        /* 6、缓存文件有效时间 分钟 */
        $this->template->cacheLifeTime = 1;
        /* 7、设置模板后缀 */
        $this->template->templateSuffix = '.html';
        /* 8、设置模板左右标签 */
        $this->template->leftTag = '{';
        $this->template->rightTag = '}';
        /* 9、模板文件路径 */
        $templateFile = ROOT_PATH . '/View/' . $file . '.html';
        if ( ! file_exists( $templateFile ) )
        {
            exit( '模板文件' . $file . '不存在' );
        }
        $this->template->display( $file, $this->vars );
    }
}

?>