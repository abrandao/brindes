<?php

require_once("config.php");


$product = new Product("1122", "Mesa", "principal", "categoria", "foto", "100",
"200", "300", "descrição", "tamanho", "área");
$product->insert();

echo $product;
echo "<br>";
var_dump($product);
