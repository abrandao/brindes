<?php

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }

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

<h1>Arquivos cadastrados com sucesso!</h1>

<p>Título:<? echo " " . $title; ?></p>

<p>Nome da Pasta:<? echo " " . $dirUploads; ?></p>

<a href="list.php">LISTAR MÍDIAS</a> 