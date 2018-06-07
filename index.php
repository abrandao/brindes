<?php
  require_once("admin/session.php");
  require_once("includes/pagination.php");
  require_once("includes/head.php");  
  include_once("admin/class/Slider.php");
  include_once("admin/class/Sql.php");
  require_once("admin/class/Company.php");
?>

<br>
<link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> 
<body>  

    <!-- Slide area -->
    <?php

      require_once("includes/header.php");

      $db_slider = new Sql();
      $slider_array = $db_slider->runQuery("SELECT * FROM slider");
      
    ?>

    <div id="demo" class="carousel slide" data-ride="carousel">

    <ul class="carousel-indicators">
    <li data-target="<?php echo $slider_array[0]['link']; ?>" data-slide-to="0" class="active"></li>
    <?php

      if (!empty($slider_array)) { 
        foreach($slider_array as $key=>$value){  
          if ($key != 0) { 
    ?>       
      
        <li data-target="<?php echo $slider_array[0]['link']; ?>" ></li>      
        
    <?php
        }    
        }
      }
    ?>  
      </ul>

      <div class="carousel-inner">
      
      <div class="carousel-item active">        
        <a href="<?php echo $slider_array[0]['link']; ?>" target="_blank">
        <img class="img-fluid" title="<?php echo $slider_array[0]['title']; ?>" alt="<?php echo $slider_array[0]['alt']; ?>"  src="<?php echo 'includes/img/slider/' . $slider_array[0]['title'] . '.jpeg'; ?>" width="1280" height="348" />
        <a>        
      </div>   

    <?php

      if (!empty($slider_array)) { 
        foreach($slider_array as $key=>$value){  
        if ($key != 0) { 
    ?>    
      <div class="carousel-item">    
        <a href="<?php echo $slider_array[$key]['link']; ?>" target="_blank">
          <img class="img-fluid img-responsive" title="<?php echo $slider_array[$key]['title']; ?>" alt="<?php echo $slider_array[$key]['alt']; ?>" src="<?php echo 'includes/img/slider/' . $slider_array[$key]['title'] . '.jpeg'; ?>" />
        </a>   
      </div>    
    <?php
        }    
        }
      }
    ?>
    </div>
    
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>    
    </div>
    <!-- End slide area -->    
    
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
          <a href="pages/category.php?category=<?php echo $category_array[$key]["category"]; ?>"><?php echo $category_array[$key]["category"]; ?></a>
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
        
        //Products list
        $db_handle = new Sql();
        $product_array = $db_handle->runQuery("SELECT * FROM products WHERE flag in (1, 2) ORDER BY title ASC LIMIT $pagina_atual,$artigos_por_pagina");       
        
	      if (!empty($product_array)) { 
		    foreach($product_array as $key=>$value){
                               
      ?>		
		
      <div class="col-md-3">
			  <form method="post" action="pages/product.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			    <a href="pages/product.php?code=<?php echo $product_array[$key]["code"]; ?>"><img class="img-fluid" src="<?php echo "admin/products/" .  $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>" title="<?php echo $product_array[$key]["title"]; ?>" alt="<?php echo $product_array[$key]["category"] . ', ' . $product_array[$key]["description"]; ?>"></a>
			    <br>
			    <a href="pages/product.php?code=<?php echo $product_array[$key]["code"]; ?>"><?php echo $product_array[$key]["title"]; ?></a><br>
			    <?php echo $product_array[$key]["code"]; ?><br>
          <button class="btn btn-outline-success" type="submit" value="Solicitar orçamento" />Orçamento</button>
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

    <br>
    <br>
    <br>
    <div class="col-lg-12">

</div>
<?php

  $db_handle = new Sql();	
  $category_array = $db_handle->runQuery("SELECT * FROM business WHERE id = 1");
  
?>

  <footer>
    <div class="container mb-0 bg-secondary pr-3 pl-3 pb-2 pt-2">
      <div class="row">        
        <div class="col-sm">
          <span class=""><a class="fa fa-facebook-square" style="font-size:50px; color:white; text-right" href="https://www.facebook.com/EpontualBrindes/"></a></span>
        </div>
        <div class="w-100"></div>
        <div class="col-sm">
          <span class="text-white align-text-bottom"><?php echo $category_array[0]["email1"] ?></span><br>
          <span class="text-white align-text-bottom"><?php echo $category_array[0]["tel1"] ?></span>
        </div>
        
        <div class="col-sm-3">
          <div class="col-sm">
            <span class="text-white align-text-bottom">
              <?php echo $category_array[0]["cnpj"] ?>
            </span>
          </div>
          <div class="col-sm">
            <span class="text-white align-text-bottom">
              <?php echo $category_array[0]["address"] ?>
            </span>
          </div>                   
        </div>
        <div class="row col-sm-6 text-right">          
          <div class="col-sm">
            <a href="http://epontual.com.br/"><img src="includes/img/logo_transparent.png" class="img-fluid" alt="Logo Epontual"></a>
          </div>
        </div>        
      </div>
    </div>
  </footer>
  
  </div>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  </body>
</html>