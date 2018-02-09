<?php

 // Initialize the session
 session_start();
 // If session variable is not set it will redirect to login page
 if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
   header("location: ../../login/login.php");
   exit;
 }
  require_once("../../class/Sql.php"); 
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="../../../css/style.css">   

    <!-- Javascript JS -->
    <script src="bootstrap.js" type="javascript"></script>

  </head>  
  <body>

<?php
  //Products listening
  $cat = $_GET["category"];  
  $db_handle = new Sql();
  $product_array = $db_handle->runQuery("SELECT * FROM products WHERE category = '$cat'");

  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){          
?>
		
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  
    <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
    <div class="row">
     
      <div class="col-sm">
        <img class="col-sm" src="<?php echo "../../products/" .  $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>">
      </div>
      <?php $product_array[$key]["id"]; ?>
      <div class="col-sm yellow">
        <?php echo "Título:<br>" . $product_array[$key]["title"]; ?>
      </div>
      <div class="col-sm green">
        <?php echo "Código:<br>" . $product_array[$key]["code"]; ?>
      </div>
      <div class="col-sm yellow">
        <?php echo "Destaque:<br>" . $product_array[$key]["flag"]; ?>
      </div>
      <div class="col-sm green">
        <?php echo "Tag:<br>" . $product_array[$key]["tag"]; ?>
      </div>
      <div class="col-sm yellow">
		    <?php echo "Categoria:<br>" . $product_array[$key]["category"]; ?>
      </div>
      <div class="col-sm green">
		    <?php echo "Tamanho:<br>" . $product_array[$key]["size"]; ?>
      </div>
      <div class="col-sm yellow">
		    <?php echo "Impressão:<br>" . $product_array[$key]["printing"]; ?>
      </div>
      <div class="col-sm green">
		    <?php echo "Tipo de impressão:<br>" . $product_array[$key]["print_type"]; ?>
      </div>
      <div class="col-sm yellow">
		    <?php echo "Descrição:<br>" . $product_array[$key]["description"]; ?>
      </div>
      <div class="col-sm green">
		    <?php echo "Comentários:<br>" . $product_array[$key]["comments"]; ?>
      </div>
      <div class="col-sm">        
        <a href="update.php?code=<?php echo $product_array[$key]["code"]; ?>"><input type="button" value="Atualizar"></a>
        <a href="delete.php?id=<?php echo $product_array[$key]["id"]; ?>"><input type="button" value="Deletar"></a>
      </div>
    </div>  
    </form>
    <hr>    
  </div>		

<?php
		}
}
?>
</div>
</body>
</html>