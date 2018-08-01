<?php

  require_once("../class/Users.php");
  require_once("../class/Sql.php");

  $id = $_GET["id"];
  
  $user = new Users();
  $user->loadById($id);  
  $user->delete();
  
  ?>

  <h1>USUÁRIO DELETADO</h1>
  <a href="users.php">RETORNAR PARA A LISTA DE USUÁRIOS</a>