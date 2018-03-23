<?php

session_start();
require_once("../admin/class/Sql.php");
require_once("../admin/class/Product.php");

$quantity1 = $_POST['quantity1'];
$quantity2 = $_POST['quantity2'];
$quantity3 = $_POST['quantity3'];
$message = $_POST['message'];

$db_handle = new Sql();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity1"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('code'=>$productByCode[0]["code"], 'title'=>$productByCode[0]["title"], 'description'=>$productByCode[0]["description"], 'size'=>$productByCode[0]["size"], 'printing'=>$productByCode[0]["printing"], 'print_type'=>$productByCode[0]["print_type"], 'comments'=>$productByCode[0]["comments"], 'message'=>$message,'quantity1'=>$quantity1, 'quantity2'=>$quantity2, 'quantity3'=>$quantity3, 'qtd_min'=>$productByCode[0]["qtd_min"]));
			
				if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity1"])) {
									$_SESSION["cart_item"][$k]["quantity1"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity1"] += $_POST["quantity1"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
		header("Location:shopcart.php");
	break;	
}
}

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
    
    <title>Epontual Brindes</title>
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

<div class="navbar">
<nav class="navbar navbar-expand navbar-light bg-light fixed-top" id="navbarCollapse">
  <ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
    <li class="nav-item"><a class="nav-link" href="../pages/knowus.php">Conheça a Epontual</a></li>
    <li class="nav-item"><a class="nav-link"  href="../pages/clients.php">Clientes</a></li>
      <li class="nav-item"><a class="nav-link"  href="../pages/releases.php">Lançamentos</a></li>      
      <li class="nav-item"><a class="nav-link" href="../pages/printing.php">Tipos de  Gravação</a></li>
      <li class="nav-item"><a class="nav-link" href="../pages/contact.php">Fale   Conosco</a></li>
    </ul>
  </nav>  
  </div>

  <form method="post" action="../admin/email.php">
  <div id="shopping-cart">
  <div class="txt-heading">Carrinho de Compras <a id="btnEmpty" href="shopcart.php? action=empty">Esvaziar o carrinho</a></div>
  <?php
  if(isset($_SESSION["cart_item"])){
      $item_total = 0;
  ?>	
  <table cellpadding="10" cellspacing="1">
  <tbody>
  <tr>
  	<th style="text-align:left;"><strong>Código</strong></th>
  	<th style="text-align:left;"><strong>Nome</strong></th>
  	<th style="text-align:right;"><strong>Descrição</strong></th>
  	<th style="text-align:right;"><strong>Tamanho</strong></th>
  	<th style="text-align:center;"><strong>Impressão</strong></th>
  	<th style="text-align:left;"><strong>Tipo de impressão</strong></th>
  	<th style="text-align:left;"><strong>Comentários</strong></th>
  	<th style="text-align:right;"><strong>Qtd Mínima</strong></th>
  	<th style="text-align:right;"><strong>Qtd 1</strong></th>
  	<th style="text-align:right;"><strong>Qtd 2</strong></th>
  	<th style="text-align:center;"><strong>Qtd 3</strong></th>
  	<th style="text-align:right;"><strong>Mensagem</strong></th>	
  </tr>	
  <?php
  
  		foreach ($_SESSION["cart_item"] as $item){
  		?>
  					<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo   $item["code"]; ?></td>
  					<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo   $item["title"]; ?></td>					
  					<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo  $item["description"]; ?></td>
  					<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo  $item["size"]; ?></td>
  					<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo   $item["printing"]; ?></td>
  					<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo   $item["print_type"]; ?></td>
  					<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo  $item["comments"]; ?></td>
  					<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo  $item["qtd_min"]; ?></td>
  					<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo   $item["quantity1"]; ?></td>
  					<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo   $item["quantity2"]; ?></td>
  					<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo  $item["quantity3"]; ?></td>
  					<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo  $item["message"]; ?></td>
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
  <br>
  <div class="row col-md-12">
     
      <div class="form-group col-md-6">
        <label for="">Seu Nome</label>
        <input type="text" name="name" class="form-control">      
      </div>
      <div class="form-group col-md-6">
        <label for="">Empresa</label>
        <input type="text" name="business" class="form-control">     
      </div>
      <div class="form-group col-md-6">
        <label for="">Seu Email</label>
        <input type="email" name="email" class="form-control">      
      </div>
      <div class="form-group col-md-6">
        <label for="">Telefone</label>
        <input type="tel" name="phone" class="form-control">    
      </div>
      <div class="form-group col-md-6">
        <label for="">Cidade</label>
        <input type="text" name="city" class="form-control">      
      </div>
      <div class="form-group col-md-6">
        <label for="">Estado</label>
        <select class="form-control" name="state">
          <option>São Paulo	SP</option>
          <option>Acre	AC</option>
          <option>Alagoas	AL</option>
          <option>Amapá	AP</option>
          <option>Amazonas	AM</option>
          <option>Bahia	BA</option>
          <option>Ceará	CE</option>
          <option>Distrito Federal	DF</option>
          <option>Espírito Santo	ES</option>
          <option>Goiás	GO</option>
          <option>Maranhão	MA</option>
          <option>Mato Grosso	MT</option>
          <option>Mato Grosso do Sul	MS</option>
          <option>Minas Gerais	MG</option>
          <option>Pará	PA</option>
          <option>Paraíba	PB</option>
          <option>Paraná	PR</option>
          <option>Pernambuco	PE</option>
          <option>Piauí	PI</option>
          <option>Rio de Janeiro	RJ</option>
          <option>Rio Grande do Norte	RN</option>
          <option>Rio Grande do Sul	RS</option>
          <option>Rondônia	RO</option>
          <option>Roraima	RR</option>
          <option>Santa Catarina	SC</option>
          <option>Sergipe	SE</option>
          <option>Tocantins TO</option>      
        </select>
      </div>
   
    <div class="form-group col-md-12">
      <label for="">Observações sobre a minha solicitação</label>
      <textarea class="form-control" name="jotting">      
      </textarea>
    </div> 

  <div>
  	<input type="submit" class="btn btn-primary" value="Enviar solicitação"/>  	
    </form> 	  
  </div>
</div>