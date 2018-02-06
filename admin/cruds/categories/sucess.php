<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../../login/login.php");
  exit;
}
?>
<h1>Categoria de produto registrada com sucesso!</h1>
<br>
<h3>Lista de categorias registradas:</h3>
<?php

require_once("../../class/Category.php");
require_once("../../class/Sql.php");

$category = $_POST['category'];

//Inserting data
$category = new Category($category);
$category->insert();

//Retrieving content
  $db_handle = new Sql();
	$category_array = $db_handle->runQuery("SELECT category FROM categories");
	asort($category_array);
	if (!empty($category_array)) { 
		foreach($category_array as $key=>$value){			
	?>  
			<br>    
			<strong><?php echo $category_array[$key]["category"]; ?></strong></div>
<?php	
			}
	}