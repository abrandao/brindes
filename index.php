<?php
require_once("admin/session.php");
require_once("includes/head.php");
require_once("includes/navbar.php");
require_once("admin/class/Sql.php");
?>
<br>
<br>
<div id="product-grid">
	<div class="txt-heading">Produtos</div>
	<?php
	$db_handle = new Sql();
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>		
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><a href="product.php?code=<?php echo $product_array[$key]["code"]; ?>"><img src="<?php echo "admin/products/" . $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></a></div>
			<br>
			<div><a href="product.php?code=<?php echo $product_array[$key]["code"]; ?>"><?php echo $product_array[$key]["title"]; ?></a></div>
			<div class="product-price"><?php echo $product_array[$key]["code"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Adicionar" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>
</body>
</html>