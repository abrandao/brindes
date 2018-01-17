<?php

require_once("../admin/session.php");
require_once("../includes/navbar.php");

echo "<br>";
echo "<br>";

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
<div id="shopping-cart">
<div class="txt-heading">Carrinho de Compras <a id="btnEmpty" href="shopcart.php?action=empty">Esvaziar o carrinho</a></div>
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
				</tr>
		<?php        
		}
	?>	
<tr>
</tr>
</tbody>
</table>		
  <?php
}
?>
<div>
	<a href="../index.php"><button type="submit" class="btnAddAction" />Adicionar mais Produtos</button></a>
	<button type="submit" class="btnAddAction" />Enviar solicitação</button>
</div>
