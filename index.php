<?php
  require_once("admin/session.php");
  require_once("includes/pagination.php");
  require_once("includes/head.php");
?>
<br>
<body>
  
<div class="container">
  <br>
  <div class="row">
		<?php require_once("includes/navbar.php"); ?>
  </div>

  <div class="row">
    <div class="row col-lg-12">
      <div class="col-md-3">
        <img src="includes/img/logo.jpeg" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-lg-6">
        <div class="col-xs-3 text-center">
          <p>TEL: (12) 3942-8089 / (12) 97402-8774</p>
        </div>
        <!-- Search button -->     
        <form method="post" action="pages/search.php">
          <div class="input-group mb-3">
          <input type="text" class="form-control" name="search" id="tags"   aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
          </div>
        </form>
      </div>
      </div>
      <div class="col-md-3">
        <img src="includes/img/orcamento.png" class="img-fluid" alt="Logo Epontual">
      </div>
    </div>

    <div class="row">
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
          <a href="pages/category.php?category=<?php echo $category_array[$key]["category"]; ?>"><?php echo $category_array[$key]["category"]; ?></a>
      <?php
		  		}
      }
      ?>
    </div>

    <div class="row col-lg-10">
      <?php
        //Sistema de paginação
        // Número de artigos por página
        $artigos_por_pagina = 12;

        // Página atual onde vamos começar a mostrar os valores
        $pagina_atual = ! empty( $_GET['pagina'] ) ? (int) $_GET['pagina'] : 0;
        $pagina_atual = $pagina_atual * $artigos_por_pagina;
        
        //Products list
        $db_handle = new Sql();
	      $product_array = $db_handle->runQuery("SELECT * FROM products WHERE flag = 1 ORDER BY id ASC LIMIT $pagina_atual,$artigos_por_pagina");
	      if (!empty($product_array)) { 
		    foreach($product_array as $key=>$value){          
      ?>		
		
      <div class="col-md-2">
			  <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			    <a href="pages/product.php?code=<?php echo $product_array[$key]["code"]; ?>"><img class="product-img" src="<?php echo "admin/products/" .  $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></a>
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
      $total_artigos = $conn->query("SELECT COUNT(*) AS total FROM products WHERE flag = 1");
      $total_artigos->execute();
      $total_artigos = $total_artigos->fetch();
      $total_artigos = $total_artigos['total'];

      // Exibimos a paginação
      if ($total_artigos >= $artigos_por_pagina ) {
        echo "<br>";
        echo paginacao( $total_artigos, $artigos_por_pagina, 5 );
      }     

      ?>
      </div>
    </div>        
  </div>
</div>

    <br>
    <br>
    <br>
    <div class="col-lg-12">

</div>

  <footer>
    <div class="container fixed-bottom bg-secondary pr-5 pl-5 pb-2 pt-2">
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
            <img src="includes/img/logo_transparent.png" class="img-fluid" alt="Logo Epontual">
          </div>
        </div>        
      </div>
    </div>
  </footer>  
  </body>
</html>