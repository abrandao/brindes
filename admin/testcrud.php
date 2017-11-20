<?php
require_once("config.php");

$product = new Product();
$product->loadById(2);
$product->delete();
echo $product;