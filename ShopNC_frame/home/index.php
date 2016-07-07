<?php
/**
 * 初始化文件
 *
 */
header("content-type:text/html;charset=utf8");
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));
if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t exists!');
if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');
if (!@include(BASE_CORE_PATH.'/b2b2c.php')) exit('b2b2c.php isn\'t exists!');

Base::run();