<?php

  require_once("../../class/Product.php");
  require_once("../../class/Sql.php");

  $id = $_GET["id"];
  
  $product = new Product();
  $product->loadById($id);
  $product->deleteImages($id);
  $product->delete();  
  ?>

  <h1>PRODUTO DELETADO</h1>
  <a href="list.php">RETORNAR PARA A LISTA DE PRODUTOS</a>  