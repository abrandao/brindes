<?php

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }

  require_once("../../class/Slider.php");
  require_once("../../class/Sql.php");

$dirUploads = "../../../includes/img/slider";
 
$title = $_POST['title'];
$alt = $_POST['alt'];
$link =  $_POST['link'];
$upfile = $_POST['upfile'];

echo "ola";
echo $upfile;

//Folder creation and renaming files
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (!is_dir($dirUploads)) {
    mkdir($dirUploads);
  }

    move_uploaded_file($_FILES['upfile']['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . $_FILES['upfile']['name']);      
  }  
  
  //Updating Slider1
  $sld = new Slider($title2, $alt2, $link2);
  //$sld->update2(1, $title2, $alt2, $link2);

  //Updating Slider2
  $sld = new Slider($title3, $alt3, $link3);
  //$sld->update3(2, $title3, $alt3, $link3);
  
?>
<link rel="stylesheet" href="../../../css/bootstrap.css">

<h1>Slide atualizado com sucesso!</h1>

<label>Título da imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $title; ?></textarea><br><br>

<label>Descrição da imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $alt; ?></textarea><br><br>

<label>Link da imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $link; ?></textarea><br><br>

<hr>

<label>Nome da Pasta:</label><br>
<textarea cols="100" disabled><? echo " " . $dirUploads; ?></textarea> 