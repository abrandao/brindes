<?php

$title = $_POST['title'];

$dirUploads = "../../../includes/img/midia";

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
?>

<h1>Produto cadastrado com sucesso!</h1>

<p>Título:<? echo " " . $title; ?></p>

<p>Nome da Pasta:<? echo " " . $dirUploads; ?></p> 

?>