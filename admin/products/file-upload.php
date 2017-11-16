<?php

require_once("../class/Product.php");
require_once("../class/Sql.php");

$code = $_POST['code'];
$title = $_POST['title'];
$tag_main = $_POST['tag_main'];
$tag_category = $_POST['tag_category'];
$upfile = $_POST['upfile[]'];
$quantity_A = $_POST['quantity_A'];
$quantity_B = $_POST['quantity_B'];
$quantity_C = $_POST['quantity_C'];
$description = $_POST['description'];
$size = $_POST['size'];
$printing = $_POST['printing'];

$product = new Product( $code, $title, $tag_main, $tag_category, $upfile[], $quantity_A, $quantity_B,
$quantity_C, $description, $size, $printing);
$product->insert();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $dirUploads = "uploads";
  if (!is_dir($dirUploads)) {
    mkdir($dirUploads);
  }

  $i = 0;
  while ($i<count($_FILES['upfile']['name'])) {
    move_uploaded_file($_FILES['upfile']['tmp_name'][$i], $dirUploads . DIRECTORY_SEPARATOR . $_FILES['upfile']['name'][$i]);
    $i++;
    }
  }

  var_dump($upfile);