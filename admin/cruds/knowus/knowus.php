<?php

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }
?>

<form method="POST" action="knowus-upload.php" enctype="multipart/form-data">
  <div>
    <label for="title">Título:</label>
  </div>
  <div>
    <input type="text" name="title" />
  </div>
  </br> 
  <div>  
    <label for="article">Artigos:</label>  
  </div>
  <div>  
    <textarea for="article" rows="4" cols="50" name="article"></textarea></br>
  </div>
  </br>  
  <div>
    <button type="submit" value="send values">Enviar</button>
  </div>
</form>