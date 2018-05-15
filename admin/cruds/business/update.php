<?php

  require_once("../../class/Company.php");
  require_once("../../class/Sql.php");

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../../login/login.php");
    exit;
  }

	$db_handle = new Sql();	
  $category_array = $db_handle->runQuery("SELECT * FROM business WHERE id = 1");
  
?>

<link rel="stylesheet" href="../../../css/bootstrap.css">
<h1>EDITANDO DADOS DA EMPRESA</h1>
<form method="POST" action="file-update.php" enctype="multipart/form-data">
  
  <label>CNPJ</label>
  <input type="text" name="cnpj" value="<?php echo $category_array[0]["cnpj"] ?>"/></br>
  <label>ENDEREÇO</label>
  <input type="text" name="address" value="<?php echo $category_array[0]["address"] ?>"/></br>
  <label>TELEFONE 1</label>
  <input type="text" name="tel1" value="<?php echo $category_array[0]["tel1"] ?>"/></br>
  <label>TELEFONE 2</label>
  <input type="text" name="tel2" value="<?php echo $category_array[0]["tel2"] ?>"/></br>
  <label>TELEFONE 3</label>
  <input type="text" name="tel3" value="<?php echo $category_array[0]["tel3"] ?>"/></br>
  <label>EMAIL 1</label>
  <input type="text" name="email1" value="<?php echo $category_array[0]["email1"] ?>"/></br>
  <label>EMAIL 2</label>
  <input type="text" name="email2" value="<?php echo $category_array[0]["email2"] ?>"/></br>
  <label>EMAIL 3</label>
  <input type="text" name="email3" value="<?php echo $category_array[0]["email3"] ?>"/></br>
  
  </select>
  <br>
  <button type="submit" value="send values">Atualizar</button>
</form>