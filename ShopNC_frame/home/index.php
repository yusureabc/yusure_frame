<?php
/**
 * 商城板块初始化文件
 *
 */
header("content-type:text/html;charset=utf8");
define('APP_ID','shop');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));
if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t exists!');
if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');
if (!@include(BASE_CORE_PATH.'/b2b2c.php')) exit('b2b2c.php isn\'t exists!');
define('APP_SITE_URL',SHOP_SITE_URL);
define('TPL_NAME',TPL_SHOP_NAME);
define('SHOP_RESOURCE_SITE_URL',SHOP_SITE_URL.DS.'resource');
define('SHOP_TEMPLATES_URL',SHOP_SITE_URL.'/templates/'.TPL_NAME);
define('BASE_TPL_PATH',BASE_PATH.'/templates/'.TPL_NAME);
/* 社区O2O商品图片 */
define('ATTACH_GOODS_PATH', 'o2o/goods');

/*非商城域名的访问转向商城域名对应网址*/
$not_shop=strpos($_SERVER['REQUEST_URI'],'/'.APP_ID.'/');
$shop_subdomain=strpos(SHOP_SITE_URL,'/'.APP_ID);
if($not_shop!==false && $shop_subdomain===false) {
	$queryUrl = str_replace('/'.APP_ID.'/','/',$_SERVER['REQUEST_URI']);
	header("HTTP/1.1 301 Moved Permanently");
	@header('Location: '.SHOP_SITE_URL.$queryUrl);
}
Base::run();
?>
