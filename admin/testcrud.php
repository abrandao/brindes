<?php
require_once("config.php");

//$product = new Product();
//$product->loadById(10);
//$product->deleteImages(13);
//$product->delete();
//echo $product;

//Listando
//$product = Product::getList();
//echo json_encode($product);

//$category = new Category();
//$category->getList();

$category = Category::getList();
echo json_encode($category);

/*
$category = new Category();
$category->loadById(2);
echo $category;
*/