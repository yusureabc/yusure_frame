<?php 

DEBUG ? error_reporting( E_ALL ) : error_reporting(0);
require ROOT_PATH . '/Core/Config.php';           //引入配置文件 
require ROOT_PATH . '/Common/function.php';       // 引入公共文件
require ROOT_PATH . '/Core/Controller.class.php'; //引入控制器类文件 
require ROOT_PATH . '/Core/View.class.php';       //视图类文件 
require ROOT_PATH . '/Core/Model.class.php';      //模型类文件 

