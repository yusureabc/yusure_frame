<?php
/**
 * 入口
 *
 */
 
$site_url = strtolower('http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/index.php')).'/home/');
header("HTTP/1.1 301 Moved Permanently");
@header('Location: '.$site_url);

