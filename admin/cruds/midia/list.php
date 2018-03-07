<?php
  
  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }
?>

<!doctype html>
<html lang="pt-BR">
  <head>
 
    <meta name="robots" content="noindex, nofollow, nosnippet, noodp, noarchive, noimageindex" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Brindes" />
    <meta name="author" content="Anderson Brandão" />
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
    <link rel="stylesheet" href="../../../css/bootstrap.css">   
    <link rel="stylesheet" href="../../../css/style.css">     
  </head>
  <a class="btn btn-primary" href="../../">Menu de administração</a>
  <a class="btn btn-success" href="upload.php">Adicionar mais imagens</a>
  <div class="container">
     <div class="row">

<?php

    $images = scandir("../../../includes/img/midia/");
      
    foreach($images as $key=>$img){	
      if(!in_array($img, array(".", ".."))) {        
?>    
    <div class="col-lg-4">
      ​<form action="delete.php" method="post">
        <img class="img-thumbnail" style="width: 200px; height: 200px;" src="<?php echo   "../../../includes/img/midia/" . $images[$key]; ?>"></img>
        <br>
        <input type="checkbox" name="img[]" value="<?php echo $images[$key]; ?>">
        <?php echo $images[$key]; ?>        
        <br>      
        <textarea class="form-control" cols="50"><?php echo "../../../includes/img/midia/" . $images[$key]; ?></textarea>        
      <hr>
    </div>
    <br>
<?php    
      }
    }
    
?>
      </div>
      <input class="btn btn-info" type="submit" value="Submit">
    </form>
  </div>
  
 