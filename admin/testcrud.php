<?php
require_once("config.php");

$product = new Product();
$product->loadById(6);
$product->deleteImages(6);
$product->delete();


//Listando
//$product = Product::getList();
//echo json_encode($product);