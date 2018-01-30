<?php

  require_once("../../class/Category.php");
  require_once("../../class/Sql.php");

  $id = $_GET["id"];
  echo $id;
  $category = new Category();
  $category->loadById($id);
  $category->delete();  
  ?>

  <h1>CATEGORIA <? $id ?> DELETADA</h1>
  <a href="list.php">RETORNAR PARA A LISTA DE CATEGORIAS</a>  