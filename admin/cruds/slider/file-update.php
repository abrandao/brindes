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

 //variables

 $id = $_POST['id'];
 $title = $_POST['title'];
 $alt = $_POST['alt'];
 $link =  $_POST['link']; 

 echo $id;
 echo "<br>";
 echo $title;
 echo "<br>";
 echo $alt;
 echo "<br>";
 echo $link;
 echo "<br>";
 echo "teste";

//Folder creation and renaming files
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (!is_dir($dirUploads)) {
    mkdir($dirUploads);
  }

   // move_uploaded_file($_FILES['upfile']['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . $title . ".jpeg");
      
  }   
  
  //Updating Slider1
  $sld = new Slider($id, $title, $alt, $link);
  $sld->update($id, $title, $alt, $link);  
  
?>
<link rel="stylesheet" href="../../../css/bootstrap.css">

<h1>Slide atualizado com sucesso!</h1>

<label>Título da primeira imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $title; ?></textarea><br><br>

<label>Descrição da primeira imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $alt; ?></textarea><br><br>

<label>Link da primeira imagem:</label><br>
<textarea cols="100" disabled><? echo " " . $link; ?></textarea><br><br> 