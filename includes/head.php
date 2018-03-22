<!doctype html>
<html lang="pt-BR">
  <head>
    <?php require_once('filepaths.php'); ?>

   <meta name="theme-color" content="#ffffff">
 
    <meta name="robots" content="noindex, nofollow, nosnippet, noodp, noarchive, noimageindex" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Brindes" />
    <meta name="author" content="Anderson Brandão; andersonbrandaolustosa@gmail.com" />
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