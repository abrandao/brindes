<?php
require_once("admin/session.php");
require_once("includes/head.php");
require_once("includes/pagination.php");
require_once("admin/class/Sql.php");
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
        <img src="includes/img/logo.png" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-lg-6">
        <div class="col-xs-3 text-center">
          <p>TEL: (12) 3942-8089</p>
        </div>
        <div class="col-xs-3 text-center">
          <p>TEL: (12) 97402-8774</p>
        </div>
        <div class="col-xs-3 text-center">
          vendas@epontual.com.br
        </div>
      </div>
      <div class="col-md-3">
      <img src="includes/img/orcamento.png" class="img-fluid" alt="Responsive image">
      </div>
    </div>

    <!-- Categories sidebar -->
    <div class="col-lg-2">      
      <?php	
      	//Retrieving category list
	      $db_handle = new Sql();
        $category_array = $db_handle->runQuery("SELECT * FROM categories");
        
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
		
      <div class="col-md-3">
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
      $total_artigos = $conn->query("SELECT COUNT(*) AS total FROM products");
      $total_artigos->execute();
      $total_artigos = $total_artigos->fetch();
      $total_artigos = $total_artigos['total'];

      // Exibimos a paginação
      if ($total_artigos > $artigos_por_pagina ) {
        echo "<br>";
        echo paginacao( $total_artigos, $artigos_por_pagina, 5 );
      }
      
      require_once("includes/footer.php");

      ?>
    </div>        
  </div>
</div>

