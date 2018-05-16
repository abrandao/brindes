<?php

  require_once("admin/class/Sql.php");

	$db_handle = new Sql();	
  $category_array = $db_handle->runQuery("SELECT * FROM business WHERE id = 1");
  
?>

<div class="container">
  
  <div class="row mt-4"> 
    <div class="fixed-top">
      <?php require_once("includes/navbar.php"); ?>
    </div>    
       
    <div class="col-md-3">
      <a href="http://epontual.com.br/"><img src="includes/img/logo.jpeg" class="img-fluid" alt="Responsive image"></a>
    </div>
    <div class="col-lg-6">
      <div class="col-xs-3 text-center">
        <p>TEL: <?php echo $category_array[0]["tel1"] ?> / <?php echo $category_array[0]["tel1"] ?></p>
      </div>
      <div class="col-xs-3 text-center">
        <p><?php echo $category_array[0]["email1"] ?></p>
      </div>
    </div>
      
    <div class="col-md-3 cont">
      <a href="http://172.17.0.2/brindes/pages/shopcart.php">
        <img class="shopcarticon" src="includes/img/shopcart.png" class="img-fluid" alt="Shopcart icon">
        <p><?php 
          $cont = $_SESSION['contagem']; 
          if ($cont == NULL) {
          echo 0;
        } else {
          echo $cont; 
        };
          if ($cont == 1) {
            echo " item";
          } else {
            echo " itens";
          }
        ?> </p>
      <a>
    </div>