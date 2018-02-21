<?php

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }

$dirUploads = "../../../includes/img/slider";

//Folder creation and renaming files
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (!is_dir($dirUploads)) {
    mkdir($dirUploads);
  }

  //$i = 0;
  //while ($i<count($_FILES['upfile']['name'])) {
    move_uploaded_file($_FILES['upfile1']['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . "img1.jpeg");
    move_uploaded_file($_FILES['upfile2']['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . "img2.jpeg");
    //$i++;
    
  }
?>

<h1>Produto cadastrado com sucesso!</h1>

<p>Título:<? echo " " . $title; ?></p>

<p>Nome da Pasta:<? echo " " . $dirUploads; ?></p> 