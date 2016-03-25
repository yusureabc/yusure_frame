<?php 
/**
 * 框架入口
 */
header("content-type:text/html;charset=utf8");

// 定义项目目录
define( 'ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)) ); 

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define( 'DEBUG', true );

require 'Init.php'; 
$control = new Controller(); 
$control->Run(); 

