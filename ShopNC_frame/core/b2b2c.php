<?php
/**
 * 运行框架
 *
 */
header("Access-Control-Allow-Origin: *"); // for 跨域
defined('IN_B2B2C') or exit('Access Invalid!');
if (!@include(BASE_DATA_PATH.'/config/config.ini.php')) exit('config.ini.php isn\'t exists!');
if ( file_exists( BASE_PATH.'/config/config.ini.php' ) ) {
    include( BASE_PATH.'/config/config.ini.php' );
}

global $config;

define( 'URL_MODEL',          $config['url_model']          );
define( 'COOKIE_DOMAIN',      $config['cookie_domain']      );
define( 'UPLOAD_SITE_URL',    $config['upload_site_url']    );
define( 'RESOURCE_SITE_URL',  $config['resource_site_url']  );


define( 'BASE_DATA_PATH',     BASE_ROOT_PATH.'/data'  );
define( 'BASE_UPLOAD_PATH',   BASE_DATA_PATH.'/upload');
define( 'BASE_RESOURCE_PATH', BASE_DATA_PATH.'/resource');
define( 'CHARSET',            $config['db'][1]['dbcharset']);
define( 'DBDRIVER',           $config['dbdriver']);
define( 'SESSION_EXPIRE',     $config['session_expire']);
define( 'LANG_TYPE',          $config['lang_type']);
define( 'COOKIE_PRE',         $config['cookie_pre']);
define( 'DBPRE',              ($config['db'][1]['dbname']).'`.`'.($config['tablepre']));
define( 'BASE_SITE',          $config['site_url']);


$_GET['act'] = $_GET['act'] ? strtolower($_GET['act']) : ($_POST['act'] ? strtolower($_POST['act']) : null);
$_GET['op']  = $_GET['op']  ? strtolower($_GET['op'])  : ($_POST['op']  ? strtolower($_POST['op'])  : null);
require( BASE_CORE_PATH.'/framework/libraries/mobile.php' );
$mobileDetect = new Mobile;
define('IS_MOBILE',$mobileDetect->isMobile());
require_once(BASE_CORE_PATH.'/framework/core/route.php');
new Route($config);

// 统一ACTION
$_GET['act'] = preg_match('/^[\w]+$/i',$_GET['act']) ? $_GET['act'] : 'index';
$_GET['op']  = preg_match('/^[\w]+$/i',$_GET['op'])  ? $_GET['op']  : 'index';

//对GET POST接收内容进行过滤,$ignore内的下标不被过滤
$ignore = array('article_content','pgoods_body','doc_content','content','sn_content','g_body','store_description','p_content','groupbuy_intro','remind_content','note_content','ref_url','adv_pic_url','adv_word_url','adv_slide_url','appcode','mail_content');
if (!class_exists('Security')) require(BASE_CORE_PATH.'/framework/libraries/security.php');
$_GET     = !empty($_GET)     ? Security::getAddslashesForInput($_GET,$ignore) : array();
$_POST    = !empty($_POST)    ? Security::getAddslashesForInput($_POST,$ignore) : array();
$_REQUEST = !empty($_REQUEST) ? Security::getAddslashesForInput($_REQUEST,$ignore) : array();
$_SERVER  = !empty($_SERVER)  ? Security::getAddSlashes($_SERVER) : array();

//启用ZIP压缩
if ( $config['gzip'] == 1 && function_exists('ob_gzhandler') && $_GET['inajax'] != 1 ) {
    ob_start('ob_gzhandler');
} else {
    ob_start();
}

require_once( BASE_CORE_PATH.'/framework/function/core.php' );
require_once( BASE_CORE_PATH.'/framework/core/base.php' );

if ( function_exists('spl_autoload_register') ) {
    spl_autoload_register(array('Base', 'autoload'));
} else {
    function __autoload( $class ) {
        return Base::autoload($class);
    }
}