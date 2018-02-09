<?php
require_once("../admin/session.php");
require_once("../includes/head.php");
require_once("../includes/pagination.php");
require_once("../admin/class/Sql.php");

?>
<br>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style.css">
<div class="container">
  <br>
  <div class="row">
  <div class="navbar">
    <nav class="navbar navbar-expand navbar-light bg-light fixed-top" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/know.php">Conheça a Epontual</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/clients.php">Clientes</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/releases.php">Lançamentos</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/promotions.php">Promoções</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/printing.php">Tipos de Gravação</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/contact.php">Fale Conosco</a></li>
      </ul>
    </nav>  
  </div>
  </div>

    <div class="row">
    <div class="row col-lg-12">
      <div class="col-md-3">
        <img src="../includes/img/logo.png" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-lg-6">
        <div class="col-xs-3 text-center">
          <p>TEL: (12) 3942-8089 / (12) 97402-8774</p>
        </div>
        <!-- Search button -->     
        <form method="post" action="search.php">
          <div class="input-group mb-3">
          <input type="text" class="form-control" name="search" id="tags"   aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
          </div>
        </form>
      </div>
      </div>
      <div class="col-md-3">
        <img src="../includes/img/orcamento.png" class="img-fluid" alt="Responsive image">
      </div>
    </div>  
    
    <!-- Categories sidebar -->
    <div class="col-lg-2">      
      <?php	
      	//Retrieving category list
        $db_handle = new Sql();        
        $category_array = $db_handle->runQuery("SELECT category FROM categories");
        sort($category_array); 
		    if (!empty($category_array)) { 
		    	foreach($category_array as $key=>$value){	
      ?>    
        <br>          
          <a href="category.php?category=<?php echo $category_array[$key]["category"]; ?>"><?php echo $category_array[$key]["category"]; ?></a>
      <?php
		  		}
      }
      ?>
    </div>

    <div class="row col-lg-10 background-color: green;">
      
      
    <?php  require_once("../includes/footer.php"); ?>
    </div>        
  </div>
</div>