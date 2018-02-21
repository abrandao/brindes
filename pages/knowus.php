<?php
require_once("../admin/session.php");
require_once("../includes/head.php");
require_once("../includes/pagination.php");
require_once("../admin/class/Sql.php");
require_once("../admin/class/Knowus.php");

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
        <li class="nav-item"><a class="nav-link" href="knowus.php">Conheça a    Epontual</a></li>    
        <li class="nav-item"><a class="nav-link"    ef="releases.php">Lançamentos</a></li>
        <li class="nav-item"><a class="nav-link"    ef="promotions.php">Promoções</a></li>    
        <li class="nav-item"><a class="nav-link" href="contact.php">Fale    nosco</a></li>
      </ul>

      <form method="post" action="pages/search.php" class="form-inline">
        <input class="form-control" type="search" placeholder="Pesquisar"     ia-label="Search" name="search"   id="tags">
        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
      </form>

    </div> 
    </nav>  

  </div>
  

    <div class="col-md-3">
      <img src="../includes/img/logo.jpeg" class="img-fluid" alt="Responsive image">
    </div>
    <div class="col-lg-6">
      <div class="col-xs-3 text-center">
        <p>TEL: (12) 3942-8089 / (12) 97402-8774</p>
      </div>
    </div>
      <!-- Search button      
      <form method="post" action="pages/search.php">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="search"   id="tags"  aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary"   type="submit">Pesquisar</button>
        </div>
      </form> 
    </div> -->

      
    <div class="col-md-3">
      <img src="../includes/img/orcamento.png" class="img-fluid float-right" alt="Logo Epontual">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>
    <footer>

    <div class="container mb-0 bg-secondary pr-2 pl-2 pb-2 pt-2">
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
    
  </footer> 
</html>
      
    
    </div>        
  </div>
</div>