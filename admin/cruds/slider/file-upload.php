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

//Folder creation and renaming files
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (!is_dir($dirUploads)) {
    mkdir($dirUploads);
  }

    move_uploaded_file($_FILES['upfile1']['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . "img1.jpeg");
    move_uploaded_file($_FILES['upfile2']['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . "img2.jpeg");
      
  }
   
  $title2 = $_POST['title2'];
  $alt2 = $_POST['alt2'];
  $link2 =  $_POST['link2'];
  $title3 = $_POST['title3'];
  $alt3 = $_POST['alt3'];
  $link3 =  $_POST['link3'];
  
  //Updating Slider1
  $sld = new Slider($title2, $alt2, $link2);
  $sld->update2(1, $title2, $alt2, $link2);

  //Updating Slider2
  $sld = new Slider($title3, $alt3, $link3);
  $sld->update3(2, $title3, $alt3, $link3);
  
?>
<link rel="stylesheet" href="../../../css/bootstrap.css">

<h1>Slide atualizado com sucesso!</h1>

<label>Título da primeira imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $title2; ?></textarea><br><br>

<label>Descrição da primeira imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $alt2; ?></textarea><br><br>

<label>Link da primeira imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $link2; ?></textarea><br><br>
<hr>
<label>Título da segunda imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $title3; ?></textarea><br><br>

<label>Descrição da segunda imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $alt3; ?></textarea><br><br>

<label>Link da segunda imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $link3; ?></textarea><br><br>

<label>Nome da Pasta:</label><br>
<textarea cols="100" disabled><? echo " " . $dirUploads; ?></textarea> 