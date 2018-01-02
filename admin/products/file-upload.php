<?php

require_once("../class/Product.php");
require_once("../class/Sql.php");

$title = $_POST['title'];
$code = $_POST['code'];
$tag = $_POST['tag'];
$category = $_POST['category'];
$description = $_POST['description'];
$dirUploads = $_POST['folder'];
$upfile = $_POST['folder'];
$qtd_min = $_POST['qtd_min'];
$qtd1 = $_POST['qtd1'];
$qtd2 = $_POST['qtd2'];
$qtd3 = $_POST['qtd3'];
$size = $_POST['size'];
$printing = $_POST['printing'];
$print_type = $_POST['print_type'];
$comments = $_POST['comments'];

$product = new Product( $title, $code, $tag, $category, $description, $upfile, $qtd_min, $qtd1, $qtd2,
$qtd3, $size, $printing, $print_type, $comments);
$product->insert();

var_dump($product);
//Folder creation and renaming files

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (!is_dir($dirUploads)) {
    mkdir($dirUploads);
  }

  $i = 0;
  while ($i<count($_FILES['upfile']['name'])) {      
    move_uploaded_file($_FILES['upfile']['tmp_name'][$i], $dirUploads . DIRECTORY_SEPARATOR . $_FILES['upfile']['name'][$i]);
    $i++;
    }
  }