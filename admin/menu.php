<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login/login.php");
  exit;
}
?>

<h3>Menu Provisório</h3>

<br>
<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
    <li class="nav-item"><a class="nav-link" href="products/upload.php">Registrar Produtos</a></li>
    <li class="nav-item"><a class="nav-link" href="cruds/categories/register.php">Registrar categoria</a></li>
    <li class="nav-item"><a class="nav-link" href="cruds/categories/list.php">Categorias registradas</a></li>
  </ul>