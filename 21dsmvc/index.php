<?php
require_once('lib/DataAccess.php');
require_once('lib/ProductModel.php');
require_once('lib/ProductView.php');
require_once('lib/ProductController.php');

$dao=& new DataAccess ('localhost','user','pass','dbname');
$productModel=& new ProductModel($dao);
$productController=& new ProductController($productModel,$_GET);
echo $productController->display();
?>