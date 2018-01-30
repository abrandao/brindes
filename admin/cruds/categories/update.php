<?php
  require_once("../../class/Category.php");
  require_once("../../class/Sql.php");

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }

	$db_handle = new Sql();
	$category_id = $_GET['id'];
  $category_array = $db_handle->runQuery("SELECT * FROM categories WHERE id = '$category_id'");
  
?>

<h1>EDITANDO CATEGORIA</h1>
<form method="POST" action="file-update.php" enctype="multipart/form-data">
  
  <label for="id">Id</label>
  <input name="id" readonly="true" value="<?php echo $category_id ?>"/></br>

  <label for="category">Título</label>
  <input type="text" name="category" value="<?php echo $category_array[0]["category"] ?>"/></br>
  
  </select>
  <br>
  <button type="submit" value="send values">Atualizar</button>
</form>
