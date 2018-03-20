<!doctype html>
<html lang="pt-BR">
  <head>

    <!-- Favicon area -->
    <link rel="apple-touch-icon" sizes="57x57" href="includes/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="includes/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="includes/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="includes/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="includes/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="includes/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="includes/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="includes/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="includes/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="includes/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="includes/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="includes/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="includes/img/favicon/favicon-16x16.png">    
    <link rel="manifest" href="includes/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="includes/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
 
    <meta name="robots" content="noindex, nofollow, nosnippet, noodp, noarchive, noimageindex" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Brindes" />
    <meta name="author" content="Anderson Brandão" />
    <meta name="description" content="A Epontual Brindes está no mercado promocional há mais de 17 anos, sempre buscando o que há de mais atualizado no mercado promocional. Em brindes somos excelência no Vale do Paraíba, Litoral Norte e Sul de Minas Gerais. Aqui você encontra o brinde personalizado ideal para fortalecer a sua marca em eventos, confraternizações, feiras ou datas sazonais.">

    <meta name="twitter:title" content="Epontual Brindes">

    <meta property="og:image" content="http://epontual.com.br/teste/includes/img/epontualface.jpeg">
    <meta property="og:description" content="A Epontual Brindes está no mercado promocional há mais de 17 anos, sempre buscando o que há de mais atualizado no mercado promocional. Em brindes somos excelência no Vale do Paraíba, Litoral Norte e Sul de Minas Gerais.">
    <meta property="og:title" content="Epontual Brindes Promocionais">
    
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
    <link rel="stylesheet" href="css/style.css">  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Javascript JS -->
    <script src="../js/bootstrap.js" type="javascript"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
  
  <?php
  
  $db_handle = new Sql();
  $search = $db_handle->runQuery("SELECT code, title FROM products");  

   foreach($search as $key=>$value){	
    $sch[] = $search[$key]["code"]; 
    $sch[] = $search[$key]["title"];     
   } 

  ?>

  <script>
    
    $( function() {
      
      var availableTags = <?php echo json_encode($sch) ?>;

      //Filtering duplicated results
      var tagsFilter = availableTags.filter(function(arr, i) {
          return availableTags.indexOf(arr) == i;
      })      
      
      $( "#tags" ).autocomplete({
        source: tagsFilter
      });
    } );
  </script>   

  </head>