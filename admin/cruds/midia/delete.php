<?php

$images = $_POST['img'];

foreach($images as $key=>$img) {

  echo $images[$key];
  unlink("../../../includes/img/midia/" . $images[$key]);
  echo "<br>";
}  
?>

<a href="list.php">RETORNAR PARA A LISTA DE MÍDIAS</a>
