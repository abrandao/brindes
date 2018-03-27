<?php
  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }
  
  include_once("../../class/Sql.php");
   
?>

  <link rel="stylesheet" href="../../../css/bootstrap.css">
  <br>
  <form method="POST" action="file-upload.php" enctype="multipart/form-data">

  <div class="col-lg-4">    
    <label>Título da imagem:</label>
    <textarea class="form-control" cols="50" name="title"></textarea>
    <br>
    <label>Descrição da imagem:</label>
    <textarea class="form-control" cols="50" name="alt"></textarea>
    <br>
    <label>Link da imagem:</label>
    <textarea class="form-control" cols="50" name="link"></textarea>    
    <hr>
  </div>
  <br>

  <h2>TAMANHO DA IMAGEM 1280x348</h2>  
    <br>    
    <label for="upfile">Imagem do slide:</label>
    <br>
    <input type="file" name="upfile"/></br>
    <br>
    <button class="btn btn-outline-success" type="submit" value="send values">Enviar</button>
  </form>