<?php
require_once("../admin/session.php");
require_once("../admin/class/Sql.php");
require_once("../admin/class/Product.php");
//require_once("../includes/head.php");
?>
<!doctype html>
<html lang="pt-BR">
  <head>
 
    <meta name="robots" content="noindex, nofollow, nosnippet, noodp, noarchive, noimageindex" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Brindes" />
    <meta name="author" content="Anderson Brandão <brandao@weblogos.com.br" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <menu http-equiv="pragma" content="no-cache" />    
    
    <title>Epontual Brindes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/hover.css">		
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
		<!-- Javascript JS -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="../js/hover.js"></script>
		<script src="../js/lightbox.js"></script>
		<?php
 
  		$db_handle = new Sql();
  		$search = $db_handle->runQuery("SELECT code, title FROM products");  
		
  		 foreach($search as $key=>$value){	
  		  $sch[] = $search[$key]["code"]; 
  		  $sch[] = $search[$key]["title"];     
  		 }   
		 
  		?>

  <script>
    $( function() {
      
      var availableTags = <?php echo json_encode($sch) ?>;

      //Filtering duplicated results
      var tagsFilter = availableTags.filter(function(arr, i) {
          return availableTags.indexOf(arr) == i;
      })      
      
      $( "#tags" ).autocomplete({
        source: tagsFilter
      });
    } );
  </script>   

  </head>  
<body>
	
<div class="fixed-top">
<nav class="navbar navbar-collapse navbar-expand-lg navbar-light bg-light">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"    aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

	<ul class="navbar-nav">
		<li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
		<li class="nav-item"><a class="nav-link" href="knowus.php">Conheça-nos</a></li>    
		<li class="nav-item"><a class="nav-link" href="releases.php">Lançamentos</a></li>		
		<li class="nav-item"><a class="nav-link" href="contact.php">Fale Conosco</a></li>
	</ul>

	<form method="post" action="search.php" class="form-inline">
		<input class="form-control" type="search" placeholder="Pesquisar" aria-label="Search" name="search" id="tags">
		<button class="btn btn-outline-success" type="submit">Pesquisar</button>
	</form>

</div> 
</nav>  
</div>

<br>
<br>
<!-- Categories sidebar -->
  <div class="row col-md-12">
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
		<div class="col-md-9">		
		
		<!-- Retriving all images -->
    <?php
			$db_handle = new Sql();
			$prod_code = $_GET['code'];
			$product_array = $db_handle->runQuery("SELECT * FROM products WHERE code = '$prod_code'");
			if (!empty($product_array)) { 
				foreach($product_array as $key=>$value){					
		?>		
   
		<div class="row">
			<br>
			
			<!-- Images area -->
			<div id="images" class="col-sm-6">
			
				<img id="imagehover2" onclick="teste();" class="img-fluid" src="<?php echo "../admin/products/" . $product_array	[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>" title="<?php echo $product_array[$key]["title"]; ?>" alt="<?php echo $product_array[$key]["category"] . ', ' . $product_array[$key]["description"]; ?>"> 
				<div class="row">			
					 
					<?php
					 $files = glob("../admin/products/" . $product_array[$key]["upfile"] . "/*.*");					 
					 echo '<div class="col-lg-4"><img id="imagehover" onmouseover="javascript:mouseHover();" class="col-xs img-fluid" src="' . $files[0] . '"></div>';
					 for ($i=1; $i<count($files); $i++)
					 {							
					 	$num = $files[$i];					
					 	echo '<div class="col-lg-4"><img id="imagehover" onmouseover="javascript:mouseHover();" class="col-xs img-fluid" src="' . $num . '"></div>';					
					 }
					?>
					
					<div id="myresult"></div>
		  	</div>    
			</div>
			<!-- End Images area -->
			
					<div class="form-group row col-sm-6 mb-4">					
					<form method="post" action="shopcart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">  
						<?php echo "Código: " . $product_array[$key]["code"]; ?><br />
						<?php echo "Produto: " . $product_array[$key]["title"]; ?><br />
						<?php echo "Descrição: " . $product_array[$key]["description"]; ?><br /> 				  
					  <?php echo "Tamanho: " . $product_array[$key]["size"]; ?><br />
					  <?php echo "Gravação: " . $product_array[$key]["printing"]; ?><br />
					  <?php echo "Tipo de impressão: " . $product_array[$key]["print_type"]; ?><br />	  
					  <?php echo "Comentário: " . $product_array[$key]["comments"]; ?><br />
					 
						<hr>
						<?php echo "Quantidade Mínima: " . $product_array[$key]["qtd_min"]; ?>
						<br />
						<br />
						<div class="col-9">
							<labe>Quantidade 1: </label>
							<input class="form-control" min="<? echo $product_array[$key]["qtd_min"]; ?>" type="number" name="quantity1" placeholder="Mínimo: <? echo $product_array[$key]["qtd_min"]; ?>"/>
						</div>
						<br />
						<div class="col-9">
							<labe>Quantidade 2: </label>
							<input class="form-control" min="<? echo $product_array[$key]["qtd_min"]; ?>" type="number" name="quantity2" placeholder="Mínimo: <? echo $product_array[$key]["qtd_min"]; ?>"/>
						</div>
						<br />
						<div class="col-9">
							<labe>Quantidade 3: </label>
							<input class="form-control" min="<? echo $product_array[$key]["qtd_min"]; ?>" type="number" name="quantity3" placeholder="Mínimo: <? echo $product_array[$key]["qtd_min"]; ?>"/>
						</div>
						<br>
						<br>
					 
						<label for="message">Comentário:</label>					  					  
  					<textarea class="form-control" for="message" rows="4" cols="50" name="message"></textarea></br>
						<br />
						<input class="btn btn-outline-success" type="submit" value="Adicionar ao Carrinho" class="btnAddAction" />
					</form>
      </div>			
    </div>

		<?php
			}
		}
	?>	
	 
</div>
	</div>
<footer>

<?php

	$db_handle = new Sql();	
	$category_array = $db_handle->runQuery("SELECT * FROM business WHERE id = 1");

?>

	<div class="container mb-0 bg-secondary pr-2 pl-2 pb-2 pt-2">
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
            <img src="../includes/img/logo_transparent.png" class="img-fluid" alt="Logo Epontual">
          </div>
        </div>        
      </div>
  </footer> 
   
</body>
</html>