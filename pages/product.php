<?php
require_once("../admin/session.php");
require_once("../includes/navbar.php");
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
<br>
<br>
<div>
	<div class="txt-heading">Produtos</div>
	<?php
	$db_handle = new Sql();
	$cdd = $_GET['code'];
$product_array = $db_handle->runQuery("SELECT * FROM products WHERE code = '$cdd'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item col-md-3">
			<form method="post" action="shopcart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img class="product-img" src="<?php echo "../admin/products/" . $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></div>
			<br>
			<div><?php echo $product_array[$key]["title"]; ?></div>
			<div class="product-price"><?php echo "Quantidade " . $product_array[$key]["qtd_min"]; ?></div>
			<div><p>Código: <?php echo $product_array[$key]["code"]; ?></p></div>
			<div><p>Tag: <?php echo $product_array[$key]["tag"]; ?></p></div>
			<div><p>Categoria: <?php echo $product_array[$key]["category"]; ?></p></div>			
			<div><p>Quantidade 1: <?php echo $product_array[$key]["qtd1"]; ?></p></div>
			<div><p>Quantidade 2: <?php echo $product_array[$key]["qtd2"]; ?></p></div>
			<div><p>Quantidade 3: <?php echo $product_array[$key]["qtd3"]; ?></p></div>
			<div><p>Tamanho: <?php echo $product_array[$key]["size"]; ?></p></div>
			<div><p>Gravação:  <?php echo $product_array[$key]["printing"]; ?></p></div>
			<div><p>Tipo de impressão: <?php echo $product_array[$key]["print_type"]; ?></p></div>
			<div>Descrição: <?php echo $product_array[$key]["description"]; ?></p></div>
			<div><p>Comentário: <?php echo $product_array[$key]["comments"]; ?></p></div>
			<div><input type="text" name="quantity" placeholder="Quantidade" size="10" /><input type="submit" value="Adicionar ao Carrinho" class="btnAddAction" /></div>			
			</form>
		</div>
	<?php
			}
	}
	?>
</body>
</html>