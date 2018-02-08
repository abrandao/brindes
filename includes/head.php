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
    <link rel="stylesheet" href="css/style.css">   

    <!-- Javascript JS -->
    <script src="bootstrap.js" type="javascript"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <?php
  require_once("admin/class/Sql.php");
  $db_handle = new Sql();
  $search = $db_handle->runQuery("SELECT title, tag, category, upfile FROM products");
   
   foreach($search as $key=>$value){	
    $sch[] = $search[$key]["title"];
    $sch[] = $search[$key]["tag"];
    $sch[] = $search[$key]["category"];
    $sch[] = $search[$key]["upfile"];    
   } 
  
  ?>

  <script>
  $( function() {
    
    var availableTags = <?php echo json_encode($sch) ?>;
    
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>   

  </head>  