<?php

// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../admin/login/login.php");
  exit;
}
?>

<h3>Menu Provisório</h3>

<br>
<ul class="navbar-nav mr-auto">
  <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
  <li class="nav-item"><a class="nav-link" href="cruds/products/upload.php">Registrar Produtos</a></li>
  <li class="nav-item"><a class="nav-link" href="cruds/products/list.php">Listar Produtos</a></li>
  <li class="nav-item"><a class="nav-link" href="cruds/categories/register.php">Registrar Categorias</a></li>
  <li class="nav-item"><a class="nav-link" href="cruds/categories/list.php">Listar Categorias</a></li>
</ul>

<br>
<br>
<br>
<p>Agora você pode editar, listar e deletar as categorias</p>