<?php
require_once("admin/session.php");
require_once("includes/head.php");
require_once("includes/navbar.php");
require_once("admin/class/Sql.php");
require_once("admin/class/Product.php");
?>
<br>
<br>
<div id="product-grid">
	<div class="txt-heading">Produtos</div>
	<?php
	$db_handle = new Sql();
	$cdd = $_GET['code'];
$product_array = $db_handle->runQuery("SELECT * FROM products WHERE code = '$cdd'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="shopcart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo "admin/products/" . $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></div>
			<br>
			<div><a href="product.php"><?php echo $product_array[$key]["title"]; ?></a></div>
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
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Adicionar" class="btnAddAction" /></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Adicionar" class="btnAddAction" /></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Adicionar" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</body>
</html>