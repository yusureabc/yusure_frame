<?php 

DEBUG ? error_reporting( E_ALL ^ E_NOTICE ) : error_reporting(0);

/* 缓存目录 */
define( 'CACHE_PATH' , ROOT_PATH . '/Cache/' );
/* 模板缓存目录 */
define( 'CACHE_TPL',  CACHE_PATH . 'tpl/' );
/* 文件缓存目录 */
define( 'CACHE_FILE', CACHE_PATH . 'file/' );
/* 模板目录 */
define( 'VIEW_PATH',  ROOT_PATH . '/View/' );
/* 类文件目录 */
define( 'CLASS_PATH', ROOT_PATH . '/Class/' );
/* 头像目录 */
define( 'AVATAR_PATH', ROOT_PATH . '/Public/upload/avatar/' );

require ROOT_PATH . '/Core/Config.php';           //引入配置文件 
require ROOT_PATH . '/Common/function.php';       // 引入公共文件
require ROOT_PATH . '/Core/Controller.class.php'; //引入控制器类文件 
require ROOT_PATH . '/Core/View.class.php';       //视图类文件 
require ROOT_PATH . '/Core/Model.class.php';      //模型类文件 

/* 公共资源目录 */
define( '__PUBLIC__', $C['PUBLIC_URL'] );

// 定义当前请求的系统常量 参考 TP
define('NOW_TIME',      $_SERVER['REQUEST_TIME']);
define('REQUEST_METHOD',$_SERVER['REQUEST_METHOD']);
define('IS_GET',        REQUEST_METHOD =='GET' ? true : false);
define('IS_POST',       REQUEST_METHOD =='POST' ? true : false);
define('IS_PUT',        REQUEST_METHOD =='PUT' ? true : false);
define('IS_DELETE',     REQUEST_METHOD =='DELETE' ? true : false);

