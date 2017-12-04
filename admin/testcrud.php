<?php
require_once("config.php");

//$product = new Product();
//$product->loadById(13);
//$product->deleteImages(13);
//$product->delete();


//Listando
//$product = Product::getList();
//echo json_encode($product);

//$category = new Category();
//$category->getList();

$category = Category::getList();
echo json_encode($category);