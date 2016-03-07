<?php
/**
 +----------------------------------------------------------
 * 小恺教你写一个属于自己的MVC框架之程序初始化文件
 +----------------------------------------------------------
 * 文 件 名  Init.php
 +----------------------------------------------------------
 * 作    者  xiaokai
 +----------------------------------------------------------
 * 时    间  2009-08-17
 +----------------------------------------------------------
 */
header("Content-type:text/html;charset=utf-8");			//设置字符集

!defined('ROOT_PATH') && define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)));
//这句是判断如果没有定义 ROOT_PATH 常量, 那么就定义常量, 相当于
//if(!defined('ROOT_PATH'))
//{
//	define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)));
//	定义常量, __FILE__是什么不知道到的看手册,  dirname获得不包含文件名的路径
//  然后将路径中的 \ 替换为 /
//  比如我现在的路径就是 E:/Web Server/www/Demo/
//}

require ROOT_PATH  . '/Core/Config.php';				//引入配置文件

require ROOT_PATH . '/Core/Controller.class.php';		//引入控制器类文件

require ROOT_PATH . '/Core/View.class.php';				//视图类文件

//require ROOT_PATH . '/Core/Model.class.php';			//模型类文件
