<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../../login/login.php");
  exit;
}
?>
<h3>Lista de categorias registradas:</h3>
<?php

require_once("../../class/Sql.php");

//Retrieving content
  $db_handle = new Sql();
	$category_array = $db_handle->runQuery("SELECT category FROM categories");
	
	asort($category_array);
	
	if (!empty($category_array)) { 
		foreach($category_array as $key=>$value){			
	?>		
      <div><strong><?php echo $category_array[$key]["id"]; ?></strong>			
				<strong>
					<?php echo $category_array[$key]["category"] . " "; ?>
				</strong>
				<a href="update.php?id=<?php echo $category_array[$key]["id"]; ?>">
				<input type="button" value="Atualizar"></a>
				<a href="delete.php?id=<?php echo $category_array[$key]["id"]; ?>">
				<input type="button" value="Deletar"></a>				
			</div>
			<br>
			<hr>			
<?php	
			}
	}
?>
	<a href="register.php">REGISTRAR NOVA CATEGORIA</a>	