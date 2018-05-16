<?php
require_once("../admin/session.php");
require_once("../includes/head.php");
require_once("../includes/pagination.php");
require_once("../admin/class/Sql.php");
require_once("../admin/class/Knowus.php");
require_once("../admin/class/Company.php");

$db_handle = new Sql();	
$category_array = $db_handle->runQuery("SELECT * FROM business WHERE id = 1");

?>
<br>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style.css">
<div class="container">
  <br>
  <div class="container">
  <div class="row mt-4"> 
    <div class="fixed-top">
    
  <nav class="navbar navbar-collapse navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse"     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse  justify-content-center"     id="navbarSupportedContent">

      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="knowus.php">Conheça-nos</a></li>    
        <li class="nav-item"><a class="nav-link" href="releases.php">Lançamentos</a></li>            
        <li class="nav-item"><a class="nav-link" href="contact.php">Fale Conosco</a></li>
      </ul>

      <form method="post" action="search.php" class="form-inline">
        <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Search" name="search"   id="tags">
        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
      </form>

    </div> 
    </nav>  

  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-sm">  
        <a href="http://epontual.com.br/"><img src="../includes/img/logo.jpeg" class="img-fluid" alt="Responsive image"></a>
      </div>
      <div class="row">
        <div class="col-sm text-center">      
          <p>TEL: <?php echo $category_array[0]["tel1"] ?> / <?php echo $category_array[0]["tel1"] ?></p>
        </div>
        <div class="w-100"></div>
        <div class="col-sm text-center">
          <p><?php echo $category_array[0]["email1"] ?></p>
        </div>
      </div>
      <div class="col-sm cont">
        <a href="http://172.17.0.2/brindes/pages/shopcart.php">
        <img class="shopcarticon" src="../includes/img/shopcart.png" class="img-fluid" alt="Shopcart icon">
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
      
    <div class="row col-lg-9 text-justify mt-4">
    <?php	
      	//Retrieving category list
        $db_article = new Sql();        
        $article = $db_article->runQuery("SELECT article FROM knowus");         
        
        if (!empty($article)) { 
		    	foreach($article as $key=>$value){

          echo $article[$key]['article'];
      
          }
        } 
      
      ?>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>
    <footer>
    <?php
      $db_handle = new Sql();	
      $category_array = $db_handle->runQuery("SELECT * FROM business WHERE id = 1");
    ?>      
        
    <div class="container mb-0 bg-secondary pr-2 pl-2 pb-2 pt-2">
      <div class="row">        
        <div class="col-sm">
          <span><a class="fa fa-facebook-square" style="font-size:50px; color:white; text-right" href="https://www.facebook.com/EpontualBrindes/"></a></span>
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
            <img src="../includes/img/logo_transparent.png" class="img-fluid" alt="Logo Epontual">
          </div>
        </div>        
      </div>
    
  </footer> 
</html>
      
    
    </div>        
  </div>
</div>