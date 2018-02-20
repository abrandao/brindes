<?php
  require_once("../admin/class/Sql.php");
  require_once("../includes/head.php"); 
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

<div class="container">
  <div class="row mt-4"> 
    <div class="fixed-top">
    
  <nav class="navbar navbar-collapse navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse"     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse  justify-content-center"     id="navbarSupportedContent">

      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="../index.php">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="knowus.php">Conheça a    Epontual</a></li>    
        <li class="nav-item"><a class="nav-link"    ef="releases.php">Lançamentos</a></li>
        <li class="nav-item"><a class="nav-link"    ef="promotions.php">Promoções</a></li>    
        <li class="nav-item"><a class="nav-link" href="contact.php">Fale  Conosco</a></li>
      </ul>
      
      
      <form method="post" action="pages/search.php" class="form-inline">
        <input class="form-control" type="search" placeholder="Pesquisar"     ia-label="Search" name="search" id="tags">
        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
      </form>
      
    </div> 
    </nav>  

  </div>
<br>
<br>
<!-- Categories sidebar -->
<div class="container">
       
 </div>
    <div>
    <form method="post" action="../admin/contact_email.php">          
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
    <div class="form-group">
      <input type="submit"  class="btn btn-primary" value="Enviar solicitação"/>
    </div>
  </form>   
  </div>  
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <footer class="fixed-bottom">
    <div class="container mb-0 bg-secondary pr-5 pl-5 pb-2 pt-2">
      <div class="row">        
        <div class="col-sm">
          <span class=""><a class="fa fa-facebook-square" style="font-size:50px; color:white; text-right" href="https://www.facebook.com/EpontualBrindes/"></a></span>
        </div>
        <div class="w-100"></div>
        <div class="col-sm">
          <span class="text-white align-text-bottom">vendas@epontual.com.br</span>
        </div>
        
        <div class="col-sm-3">
          
        </div>
        <div class="row col-sm-6 text-right">          
          <div class="col-sm">
            <img src="../includes/img/logo_transparent.png" class="img-fluid" alt="Logo Epontual">
          </div>
        </div>        
      </div>
    </div>
  </footer> 