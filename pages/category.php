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

<div class="fixed-top">
<nav class="navbar navbar-collapse navbar-expand-lg navbar-light bg-light">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse  justify-content-center" id="navbarSupportedContent">

	<ul class="navbar-nav">
		<li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
		<li class="nav-item"><a class="nav-link" href="knowus.php">Conheça-nos</a></li>    
		<li class="nav-item"><a class="nav-link" href="releases.php">Lançamentos</a></li>
		<li class="nav-item"><a class="nav-link" href="promotions.php">Promoções</a></li>    
		<li class="nav-item"><a class="nav-link" href="contact.php">Fale Conosco</a></li>
	</ul>

	<form method="post" action="search.php" class="form-inline">
		<input class="form-control" type="search" placeholder="Pesquisar" aria-label="Search" name="search" id="tags">
		<button class="btn btn-outline-success" type="submit">Pesquisar</button>
	</form>

</div> 
</nav>  
</div>

  </div>

    <div class="row">
    <div class="row col-lg-12">
      <div class="col-md-3">
        <img src="../includes/img/logo.jpeg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-lg-6">
        <div class="col-xs-3 text-center">
          <p>TEL: (12) 3942-8089 / (12) 97402-8774</p>
        </div>
        <div class="col-xs-3 text-center">
          <p>vendas@epontual.com.br</p>
        </div>        
      </div>
      <div class="col-md-3">
        <img src="../includes/img/orcamento.png" class="img-fluid" alt="Responsive image">
      </div>
    </div>  
    
    <!-- Categories sidebar -->
    <div class="col-lg-3">      
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

    <div class="row col-lg-9">
      <?php
        //Sistema de paginação
        // Número de artigos por página
        $artigos_por_pagina = 12;

        // Página atual onde vamos começar a mostrar os valores
        $pagina_atual = ! empty( $_GET['pagina'] ) ? (int) $_GET['pagina'] : 0;
        $pagina_atual = $pagina_atual * $artigos_por_pagina;
    
        //Products listening by category
        $cat = $_GET['category'];
        $prod_code = $_GET['code'];
        $db_handle = new Sql();
	      $product_array = $db_handle->runQuery("SELECT * FROM products WHERE category = '$cat'");
	      if (!empty($product_array)) { 
		    foreach($product_array as $key=>$value){          
      ?>		
      
      <div class="col-md-3">
			  <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			    <a href="product.php?code=<?php echo $product_array[$key]["code"]; ?>"><img class="img-fluid" src="<?php echo "../admin/products/" .  $product_array[$key] ["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></a>
			    <br>
			    <a href="pages/product.php?code=<?php echo $product_array[$key]["code"]; ?>"><?php echo $product_array[$key]["title"]; ?></a><br>
			    <?php echo $product_array[$key]["code"]; ?><br>
          <a href="pages/product.php?code=<?php echo $product_array[$key]["code"]; ?>"><button type="submit" value="Solicitar orçamento" class="btnAddAction" />Solicitar Orçamento</a>
        </form>    
		  </div>		
	    <?php
	    		}
	    }
	    ?>
	  </div>
    <br>
    <br>
    <br>
    <div class="col-lg-12 text-center border-top-10">
    <?php

      //Pegamos o valor total de artigos em uma consulta sem limite
      $conn = new Sql();
      $total_artigos = $conn->query("SELECT COUNT(*) AS total FROM products");
      $total_artigos->execute();
      $total_artigos = $total_artigos->fetch();
      $total_artigos = $total_artigos['total'];

      // Exibimos a paginação
      if ($total_artigos > $artigos_por_pagina ) {
        echo "<br>";
        echo paginacao( $total_artigos, $artigos_por_pagina, 5 );
      }
      ?>
    </div>        
  </div>
</div>

<footer class="fixed-bottom">
    <div class="container mb-0 bg-secondary pr-5 pl-5 pb-2 pt-2">
      <div class="row">        
        <div class="col-sm">
          <span class=""><a class="fa fa-facebook-square" style="font-size:50px; color:white; text-right" href="https://www.facebook.com/EpontualBrindes/"></a></span>
        </div>
        <div class="w-100"></div>
        <div class="col-sm">
          <span class="text-white align-text-bottom">vendas@epontual.com.br</span>
        </div>
        
        <div class="col-sm-3">
          
        </div>
        <div class="row col-sm-6 text-right">          
          <div class="col-sm">
            <img src="../includes/img/logo_transparent.png" class="img-fluid" alt="Logo Epontual">
          </div>
        </div>        
      </div>
    </div>
  </footer>
  
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 