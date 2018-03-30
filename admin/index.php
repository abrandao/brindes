<?php

// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../admin/login/login.php");
  exit;
}

  require_once("class/Sql.php");
?>
<div align="center">
  <h3>Menu Provisório</h3>

  <br>

    <li class="nav-item"><a class="nav-link" href="../index.php"><strong>Início</strong></a></li>  
    <hr>
    <li class="nav-item"><a class="nav-link" href="cruds/categories/register.php"><strong>REGISTRAR CATEGORIA</strong></a></li>
    <li class="nav-item"><a class="nav-link" href="cruds/categories/list.php"><strong>LISTAR CATEGORIAS</strong></a></li>
    <hr>
    <li class="nav-item"><a class="nav-link" href="cruds/knowus/knowus.php"><strong>REGISTRAR "Conheça a Epontual"</strong></a></li>
    <hr>
    <li class="nav-item"><a class="nav-link" href="cruds/slider/list.php"><strong>LISTAR SLIDES</strong></a></li>    
    <li class="nav-item"><a class="nav-link" href="cruds/slider/upload.php"><strong>CADASTRAR SLIDES</strong></a></li>
    <hr>
    <li class="nav-item"><a class="nav-link" href="cruds/midia/list.php"><strong>LISTAR ARQUIVOS DE MÍDIA</strong></a></li>
    <li class="nav-item"><a class="nav-link" href="cruds/midia/upload.php"><strong>FAZER UPLOAD DE ARQUIVOS DE MÍDIA</strong></a></li>
    <hr>
    <li class="nav-item"><a class="nav-link" href="cruds/products/upload.php"><strong>REGISTRAR PRODUTOS</strong></a></li>
    <li class="nav-item"><a class="nav-link" href="cruds/products/list.php"><strong>LISTAR TODOS OS PRODUTOS</strong></a></li>
    <li class="nav-tem"><a class="nav-link" href="cruds/products/list.php"><strong>LISTAR PRODUTOS POR CATEGORIA</strong></a></li>
    <?php	

      //Retrieving category list
      $db_handle = new Sql();
      $category_array = $db_handle->runQuery("SELECT category FROM categories");

      sort($category_array);        

      if (!empty($category_array)) {         

        foreach($category_array as $key=>$value){	

      ?>    
      <br>          
        <a href="cruds/products/list2.php?category=<?php echo $category_array[$key]["category"]; ?>"><?php echo $category_array[$key]["category"]; ?></a>
      <?php
        }
      }
    ?>
</div> 