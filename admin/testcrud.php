<?php
require_once("config.php");

//$product = new Product();
//$product->loadById(12);
//$product->update(dc);
//$product->deleteImages(12);
//$product->delete();
//echo $product;

//Listando
//$product = Product::getList();
//echo json_encode($product);

//$category = new Category();
//$category->getList();

//$category = Category::getList();
//echo json_encode($category);


$category = new Category();
$category->loadById(19);
$category->delete();
echo $category;
