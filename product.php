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
			<form method="post" action="product.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo "admin/products/" . $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></div>
			<br>
			<div><a href="product.php"><?php echo $product_array[$key]["title"]; ?></a></div>
			<div class="product-price"><?php echo "Quantidade " . $product_array[$key]["qtd_min"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Adicionar" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</body>
</html>