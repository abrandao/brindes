<?php
require_once("admin/session.php");
require_once("includes/head.php");
require_once("includes/navbar.php");
require_once("includes/pagination.php");
require_once("admin/class/Sql.php");

//Sistema de paginação
// Número de artigos por página
$artigos_por_pagina = 9;

// Página atual onde vamos começar a mostrar os valores
$pagina_atual = ! empty( $_GET['pagina'] ) ? (int) $_GET['pagina'] : 0;
$pagina_atual = $pagina_atual * $artigos_por_pagina;
?>
<br>
<br>
<div id="product-grid" class="col-sm-12">
	<div class="txt-heading">Produtos</div>
	<?php
	$db_handle = new Sql();
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC LIMIT $pagina_atual,$artigos_por_pagina");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){			
	?>		
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><a href="pages/product.php?code=<?php echo $product_array[$key]["code"]; ?>"><img src="<?php echo "admin/products/" . $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></a></div>
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
<?php

	//Pegamos o valor total de artigos em uma consulta sem limite
	$conn = new Sql();
	$total_artigos = $conn->query("SELECT COUNT(*) AS total FROM products");
	$total_artigos->execute();
	$total_artigos = $total_artigos->fetch();
	$total_artigos = $total_artigos['total'];

	// Exibimos a paginação	
	echo paginacao( $total_artigos, $artigos_por_pagina, 5 );
	?>
</body>
</html>