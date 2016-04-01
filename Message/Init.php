<?php 

DEBUG ? error_reporting( E_ALL ) : error_reporting(0);

/* 缓存目录 */
define( 'CACHE_PATH' , ROOT_PATH . '/Cache/' );
/* 模板缓存目录 */
define( 'CACHE_TPL',  CACHE_PATH . 'tpl/' );
/* 文件缓存目录 */
define( 'CACHE_FILE', CACHE_PATH . 'file/' );
/* 模板目录 */
define( 'VIEW_PATH',  ROOT_PATH . '/View/' );

require ROOT_PATH . '/Core/Config.php';           //引入配置文件 
require ROOT_PATH . '/Common/function.php';       // 引入公共文件
require ROOT_PATH . '/Core/Controller.class.php'; //引入控制器类文件 
require ROOT_PATH . '/Core/View.class.php';       //视图类文件 
require ROOT_PATH . '/Core/Model.class.php';      //模型类文件 

/* 公共资源目录 */
define( '__PUBLIC__', $C['PUBLIC_URL'] );

