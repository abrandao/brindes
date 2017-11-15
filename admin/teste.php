<?php

require_once("config.php");


$product = new Product("1122", "Mesa");
$product->insert();

echo $product;
echo "<br>";
var_dump($product);
