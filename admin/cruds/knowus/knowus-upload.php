<?php

require_once("../../class/Knowus.php");
require_once("../../class/Sql.php");

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }

$title = $_POST['title'];
$article = $_POST['article'];

echo $title;
echo "<br>";
echo $article;

//Inserting article
$knowus = new Knowus( $title, $article);
$knowus->insert();
?>
<h1>Artigo cadastrado com sucesso!</h1>

<p>Título:<? echo " " . $title; ?></p>
<p>artigo:<? echo " " . $article; ?></p>