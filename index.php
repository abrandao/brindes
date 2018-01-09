<?php
require_once("admin/session.php");
require_once("includes/head.php");
//require_once("includes/navbar.php");
require_once("includes/pagination.php");
require_once("admin/class/Sql.php");

//Sistema de paginação
// Número de artigos por página
$artigos_por_pagina = 9;

// Página atual onde vamos começar a mostrar os valores
$pagina_atual = ! empty( $_GET['pagina'] ) ? (int) $_GET['pagina'] : 0;
$pagina_atual = $pagina_atual * $artigos_por_pagina;

// Cria a consulta para o MySQL e executa
$conn = new Sql();
$stmt = $conn->runQuery("SELECT * FROM products LIMIT $pagina_atual,$artigos_por_pagina");
//$stmt->execute();

//echo var_dump($stmt);

// Mostra os valores
//while( $f = $stmt->fetch() ) {
   //echo $f["{$prefixo}titulo"] . '<br>';
  // echo $f[0] . $f[1] . '<br>';
   //var_dump($f);
//}

/* Pegamos o valor total de artigos em uma consulta sem limite
$total_artigos = $conn->prepare("SELECT COUNT(*) AS total FROM products");
$total_artigos->execute();
$total_artigos = $total_artigos->fetch();
$total_artigos = $total_artigos['total'];
*/
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
			<div class="product-image"><a href="pages/product.php?code=<?php echo $product_array[$key]["code"]; ?>"><img src="<?php 
		
	
			echo "admin/products/" . $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></a></div>
			<br>
			<div><a href="product.php?code=<?php echo $product_array[$key]["code"]; ?>"><?php echo $product_array[$key]["title"]; ?></a></div>
			<div class="product-price"><?php echo $product_array[$key]["code"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Adicionar" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}

/*
if (!is_dir("images")) mkdir("images");
foreach (scandir("images") as $item) {
  if(!in_array($item, array(".", ".."))) {
    
    unlink("images/" . $item );
  }
}
echo "OK";
*/

	// Exibimos a paginação
	echo $paginas;
	//var_dump();
	echo paginacao( $total_artigos, $artigos_por_pagina, 5 );
	?>
</div>
</body>
</html>