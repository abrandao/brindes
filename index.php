<?php

require_once("admin/session.php");
require_once("includes/head.php");
require_once("includes/navbar.php");
//require_once("includes/header.php");
echo "<br>";
echo "<br>";
?>
<body>
<div id="shopping-cart">
<div class="txt-heading">Carrinho de Compras <a id="btnEmpty" href="index.php?action=empty">Esvaziar o carrinho</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Nome</strong></th>
<th style="text-align:left;"><strong>Código</strong></th>
<th style="text-align:right;"><strong>Quantidade</strong></th>
<th style="text-align:right;"><strong>Preço</strong></th>
<th style="text-align:center;"><strong>Ação</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["title"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["qtd_min"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remover Item</a></td>
				</tr>
				<?php
        $item_total += $item["quantity"];
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "R$".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Produtos</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo "admin/products/" . $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>"></div>
			<div><strong><?php echo $product_array[$key]["title"]; ?></strong></div>
			<div class="product-price"><?php echo "R$".$product_array[$key]["qtd_min"]; ?></div>
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