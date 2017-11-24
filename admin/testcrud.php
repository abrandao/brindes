<?php
require_once("config.php");

$product = new Product();
$product->loadById(26);
$product->deleteImages(26);
$product->delete();