<h1>Categoria de produto registrada com sucesso!</h1>

<br>

<h3>Lista de categorias registradas:</h3>

<?php

require_once("../class/Category.php");
require_once("../class/Sql.php");

$category = $_POST['category'];

//Inserting data
$category = new Category($category);
$category->insert();

//Retrieving content
  $db_handle = new Sql();
	$category_array = $db_handle->runQuery("SELECT * FROM categories ORDER BY id ASC");
	if (!empty($category_array)) { 
		foreach($category_array as $key=>$value){			
	?>
      <div><strong><?php echo $category_array[$key]["id"]; ?></strong>
			<strong><?php echo $category_array[$key]["category"]; ?></strong></div>
<?php	
			}
	}