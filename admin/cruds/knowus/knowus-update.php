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


  $id = 9;
  $title = $_POST['title']; 
  $article = $_POST['article'];


  $art = new Knowus($title, $article);
  $art->loadById($id);   
  $art->update($title, $article);