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
    
    <title>Epontual Brindes</title>
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
  $db_handle = new Sql();
  $slider_array = $db_handle->runQuery("SELECT * FROM slider");

  if (!empty($slider_array)) { 
    foreach($slider_array as $key=>$value){          
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  
    <form method="post" action="index.php?action=add&code=<?php echo $slider_array[$key]["id"]; ?>">
    <div class="row">
     
      <div class="col-sm">
        <img class="col-sm" src="<?php echo "../../../includes/img/slider/" .  $slider_array[$key]["title"] . ".jpeg"; ?>">
      </div>
      <?php $slider_array[$key]["id"]; ?>
      <div class="col-sm">
        <?php echo "Título:<br>" . $slider_array[$key]["title"]; ?>
      </div>
      <div class="col-sm">
        <?php echo "Descrição:<br>" . $slider_array[$key]["alt"]; ?>
      </div>
      <div class="col-sm">
        <?php echo "Link:<br>" . $slider_array[$key]["link"]; ?>
      </div>      
      <div class="col-sm">        
        <a href="update.php?id=<?php echo $slider_array[$key]["id"]; ?>"><input type="button" value="Atualizar"></a>
        <a href="delete.php?id=<?php echo $slider_array[$key]["id"]; ?>"><input type="button" value="Deletar"></a>
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
<a class="nav-link" href="upload.php"><strong>ADICIONAR SLIDES</strong></a>
</body>
</html>