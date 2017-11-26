<?php
require_once("config.php");

$product = new Product();
$product->loadById(4);
$product->deleteImages(4);
$product->delete();