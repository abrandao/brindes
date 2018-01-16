<?php
require_once("admin/session.php");
require_once("includes/head.php");
require_once("includes/pagination.php");
require_once("admin/class/Sql.php");
?>
<br>
<body>
		<?php require_once("includes/navbar.php"); ?>
<div class="container">
  <div class="row">
    <div class="row col-lg-12">
      <div class="col-md-3">
        <img src="includes/img/logo.png" class="img-fluid" alt="Responsive image">
      </div>
      <div class="col-md-6">
        dsfçlksadfçl
      </div>
      <div class="col-md-3">
        dsfçlksadfçl
      </div>
    </div>
    <div class="col-lg-2">      
    <?php	
    	//Retrieving category list
	    $db_handle = new Sql();
		  $category_array = $db_handle->runQuery("SELECT * FROM categories ORDER BY id ASC");
		  if (!empty($category_array)) { 
		  	foreach($category_array as $key=>$value){	
  ?>    
      <br>
        <?php echo $category_array[$key]["category"];
				}
    }
    ?>
  </div>

    <div class="col-lg-10">
      <?php
        //Sistema de paginação
        // Número de artigos por página
        $artigos_por_pagina = 12;

        // Página atual onde vamos começar a mostrar os valores
        $pagina_atual = ! empty( $_GET['pagina'] ) ? (int) $_GET['pagina'] : 0;
        $pagina_atual = $pagina_atual * $artigos_por_pagina;
        
        $db_handle = new Sql();
	      $product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC       LIMIT $pagina_atual,$artigos_por_pagina");
	      if (!empty($product_array)) { 
		    foreach($product_array as $key=>$value){          
      ?>
		
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><a href="pages/product.php?code=<?php echo $product_array[$key]["code"]; ?>"><img src="<?php echo "admin/products/" . $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></a></div>
			<br>
			<div><a href="pages/product.php?code=<?php echo $product_array[$key]["code"]; ?>"><?php echo $product_array[$key]["title"]; ?></a></div>
			<div class="product-price"><?php echo $product_array[$key]["code"]; ?></div>
			<div><input type="submit" value="Solicitar orçamento" class="btnAddAction" /></div>
			</form>
		</div>		
	    <?php
	    		}
	    }
	    ?>
	  </div>
	
    <div class="col-lg-12 text-center">
    <?php

      //Pegamos o valor total de artigos em uma consulta sem limite
        $conn = new Sql();
        $total_artigos = $conn->query("SELECT COUNT(*) AS total FROM products");
        $total_artigos->execute();
        $total_artigos = $total_artigos->fetch();
        $total_artigos = $total_artigos['total'];

        // Exibimos a paginação		
        echo paginacao( $total_artigos, $artigos_por_pagina, 5 );

        require_once("includes/footer.php");
      ?>
    </div>        
  </div>
</div>

