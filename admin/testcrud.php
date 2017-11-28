<?php
require_once("config.php");

$product = new Product();
$product->loadById(5);
$product->deleteImages(5);
$product->delete();


//Listando
//$product = Product::getList();
//echo json_encode($product);