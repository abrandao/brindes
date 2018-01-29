<?php

require_once("../../class/Product.php");
require_once("../../class/Sql.php");
$id = $_POST['id'];
$title = $_POST['title'];
$code = $_POST['code'];
$flag = $_POST['flag'];
$tag = $_POST['tag'];
$category = $_POST['category'];
$description = $_POST['description'];
$dirUploads = "../../products/" . $_POST['folder'];
$upfile = $_POST['folder'];
$qtd_min = $_POST['qtd_min'];
$size = $_POST['size'];
$printing = $_POST['printing'];
$print_type = $_POST['print_type'];
$comments = $_POST['comments'];

//Inserting product
$product = new Product( $title, $code, $flag, $tag, $category, $description, $upfile, $qtd_min, $qtd1, $qtd2,
$qtd3, $size, $printing, $print_type, $comments);
$product->loadById($id);
$product->update($title, $code, $flag, $tag, $category, $description, $upfile, $qtd_min, $size, $printing, $print_type, $comments);

/*
Folder creation and renaming files
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (!is_dir($dirUploads)) {
    mkdir($dirUploads);
  }

  $i = 0;
  while ($i<count($_FILES['upfile']['name'])) {      
    move_uploaded_file($_FILES['highlight']['tmp_name'][$i], $dirUploads . DIRECTORY_SEPARATOR . $dirUploads . "/" . $upfile . "_" . (string)$i . ".jpg");
    move_uploaded_file($_FILES['upfile']['tmp_name'][$i], $dirUploads . DIRECTORY_SEPARATOR . $_FILES['upfile']['name'][$i]);
    $i++;
    }
  } */
?>

<h1>Produto editado com sucesso!</h1>
<p>ID:<? echo " " .  $id; ?></p>
<p>Título:<? echo " " . $title; ?></p>
<p>Código:<? echo " " . $code; ?></p> 
<p>Destaque:<? echo " " . $flag; ?></p>
<p>Tag:<? echo " " . $tag; ?></p> 
<p>Categoria:<? echo " " . $category; ?></p> 
<p>Descrição:<? echo " " . $description; ?></p> 
<p>Nome da Pasta:<? echo " " . $dirUploads; ?></p> 
<p>Quantidade Mínima:<? echo " " . $qtd_min; ?></p> 
<p>Tamanho:<? echo " " . $size; ?></p> 
<p>Impressão:<? echo " " . $printing; ?></p> 
<p>Tipo de Impressão:<? echo " " . $print_type; ?></p> 
<p>Comentários:<? echo " " . $comments; ?></p>