<?php

  require_once("../../class/Slider.php");
  require_once("../../class/Sql.php");

  $id = $_GET["id"];
  
  $product = new Slider();
  $product->loadById($id);
  //$product->deleteImages($id);
  $product->delete();  
  ?>

  <h1>SLIDE DELETADO</h1>
  <a href="list.php">RETORNAR PARA A LISTA DE SLIDES</a>