<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<h3>Menu Provisório</h3>

<br>
<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
    <li class="nav-item"><a class="nav-link" href="admin/products/upload.php">Registrar Produtos - teste por enquanto, não registrar ainda</a></li>
    <li class="nav-item"><a class="nav-link" href="admin/categories/register.php">Registrar categoria</a></li>
    <li class="nav-item"><a class="nav-link" href="admin/categories/registered.php">Categorias registradas</a></li>
  </ul>