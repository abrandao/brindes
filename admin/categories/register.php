<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login/login.php");
  exit;
}
?>

<form method="POST" action="registered.php" enctype="multipart/form-data">

<label for="category">Categoria</label>
<input type="text" name="category" /></br>

<button type="submit" value="send values">Enviar</button>
</form>