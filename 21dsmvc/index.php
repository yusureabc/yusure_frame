<?php
//报告运行时错误
error_reporting(E_ERROR | E_WARNING | E_PARSE);
header("content-type:text/html;charset=utf8");

require_once('lib/DataAccess.php');     // 数据库操作类
require_once('lib/ProductModel.php');   // 模型
require_once('lib/ProductView.php');    // 视图
require_once('lib/ProductController.php');  // 控制器

// 实例化数据库，连接数据库
$dao               = new DataAccess ('localhost','yusure','yukill56','21ds_mvc');   
// 实例化模型
$productModel      = new ProductModel($dao);
// 实例化控制器
$productController = new ProductController($productModel,$_GET);
// 模板显示
echo $productController->display();
?>