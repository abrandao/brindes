<?php

  require_once("../../class/Slider.php");
  require_once("../../class/Sql.php");

  $id = $_GET["id"];
  
  $slide = new Slider();
  $slide->loadById($id);
  $slide->deleteImage($id);
  $slide->delete();  
  ?>

  <h1>SLIDE DELETADO</h1>
  <a href="list.php">RETORNAR PARA A LISTA DE SLIDES</a>