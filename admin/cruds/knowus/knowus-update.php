<?php

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }

  require_once("../../class/Sql.php");
  require_once("../../class/Knowus.php");


  $id = 1;
  $title = $_POST['title']; 
  $article = $_POST['article'];


  $art = new Knowus($title, $article);
  $art->loadById($id);   
  $art->update($title, $article);

?>

  <h1>Artigo editado com sucesso!</h1>
  
  <a href="../../../pages/knowus.php">Visitar a página "Conheça a Epontual".</a>
  <br>
  <a href="../../index.php">Retornar ao menu de administração.</a>