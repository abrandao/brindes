<?php
require_once("../admin/session.php");
require_once("../admin/class/Sql.php");
require_once("../admin/class/Product.php");
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
    
    <title>Brindes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">   

    <!-- Javascript JS -->
    <script src="bootstrap.js" type="javascript"></script>

  </head>  
<body>

<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="navbarCollapse">
	  <ul class="navbar-nav">
	    <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
	    <li class="nav-item"><a class="nav-link" href="../pages/know.php">Conheça-nos</a></li>
	    <li class="nav-item"><a class="nav-link" href="../pages/clients.php">Clientes</a></li>
	    <li class="nav-item"><a class="nav-link" href="../pages/releases.php">Lançamentos</a></li>
	    <li class="nav-item"><a class="nav-link" href="../pages/promotions.php">Promoções</a></li>
	    <li class="nav-item"><a class="nav-link" href="../pages/printing.php">Tipos de 	Gravação</a></li>
	    <li class="nav-item"><a class="nav-link" href="../pages/contact.php">Fale Conosco</a></li>
	  </ul>
	</nav>  
<br>
<br>
<!-- Categories sidebar -->
  <div class="row col-md-12">
	  <div class="col-lg-2">      
      <?php	
      	//Retrieving category list
	      $db_handle = new Sql();
		    $category_array = $db_handle->runQuery("SELECT * FROM categories ORDER BY id  ASC");
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
		<div class="col-md-10">		
		
		<!-- Retriving Highlight Image -->
    <?php
			$db_handle = new Sql();
			$prod_code = $_GET['code'];
			$product_array = $db_handle->runQuery("SELECT * FROM products WHERE code = '$prod_code'");
			if (!empty($product_array)) { 
				foreach($product_array as $key=>$value){
		?>		
		
    <!-- Retriving all images -->
		<div class="row">
					<br>
			<div class="col-sm-6">
			
				<img class="product-img" src="<?php echo "../admin/products/" . $product_array	[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"> 
				<div class="row">				
				  
					<?php
					 $files = glob("../admin/products/" . $product_array[$key]["upfile"] . "/*.*");
					 for ($i=1; $i<count($files); $i++)
					 {	
					 	$num = $files[$i];					
					 	echo '<div class="col-lg-4"><img class="col-xs product-img" src="' . $num . '"></div>';					
					 }
					?>

		  	</div>    
				</div>				
					<div class="row col-sm-5">					
					<form method="post" action="shopcart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">					  
						<?php echo "Código: " . $product_array[$key]["code"]; ?><br />
						<?php echo "Produto: " . $product_array[$key]["title"]; ?><br />
						<?php echo "Descrição: " . $product_array[$key]["description"]; ?><br />
					  <?php echo "Quantidade Mínima: " . $product_array[$key]["qtd_min"]; ?><br />				
					  <?php echo "Código: " . $product_array[$key]["code"]; ?><br />			  				  
					  <?php echo "Tamanho: " . $product_array[$key]["size"]; ?><br />
					  <?php echo "Gravação: " . $product_array[$key]["printing"]; ?><br />
					  <?php echo "Tipo de impressão: " . $product_array[$key]["print_type"]; ?><br />					  
					  <?php echo "Comentário: " . $product_array[$key]["comments"]; ?><br />
					<div>
					<hr>
					<labe>Quantidade 1: </label><input type="text" name="quantity" placeholder="Quantidade" size="8" /><br /><br />
					<labe>Quantidade 2: </label><input type="text" name="quantity" placeholder="Quantidade" size="8" /><br /><br />
					<labe>Quantidade 3: </label><input type="text" name="quantity" placeholder="Quantidade" size="8" /><br /><br />
					<label for="comments">Comentários</label>  
  				<textarea for= "comments" rows="4" cols="50" name="comments"></textarea></br>
					<br />
					<input type="submit" value="Adicionar   ao Carrinho" class="btnAddAction" /></div>
			</form>
      </div>			
    </div>

		<?php
			}
		}
	?>	
	
</div>
</body>
</html>