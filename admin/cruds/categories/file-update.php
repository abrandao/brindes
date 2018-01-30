<?php

require_once("../../class/Category.php");
require_once("../../class/Sql.php");

$id = $_POST['id'];
$category = $_POST['category'];

//Updating Category
$cat = new Category($category);
$cat->loadById($id);
$cat->update($category);
?>

<h1>Categoria editada com sucesso!</h1>
<p>ID:<? echo " " .  $id; ?></p>
<p>Categoria:<? echo " " . $category; ?></p>
<a href="list.php">Retornar à lista de categorias</a>