<?php
require_once("config.php");


// Delete
$product = new Product();
$product->loadById(32);
//$product->deleteImages();
$product->delete();
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo $product;
/*
//$scan = "products/Fany"; //. $upfile;
foreach (scandir("products") as $item) {
  if(!in_array($item, array(".", ".."))) {
    unlink($item);
  } 
}
rmdir("products/Fany");
*/
///
//$product = new Product();
//$product->loadById(58);
//echo $upfile;

//unlink("products/Fany/Fany_2.jpg");

//rmdir("products/Fany");