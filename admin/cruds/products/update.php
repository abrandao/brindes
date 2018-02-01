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
	$prod_code = $_GET['code'];
  $product_array = $db_handle->runQuery("SELECT * FROM products WHERE code = '$prod_code'");
      
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
      
     $renamed_folder = $product_array[$key]["upfile"];
     
?>

<h1>EDITANDO PRODUTO</h1>
<form method="POST" action="file-update.php" enctype="multipart/form-data">
  
  <input name="renamefolder" type="hidden" value="<?php echo $renamed_folder ?>"/></br>

  <label for="id">Id</label>
  <input name="id" readonly="true" value="<?php echo $product_array[$key]["id"] ?>"/></br>

  <label for="title">Título</label>
  <input type="text" name="title" value="<?php echo $product_array[$key]["title"] ?>"/></br>

  <label for="description">Descrição</label><br>  
  <textarea for="description" rows="4" cols="50" name="description"><?php echo $product_array[$key]["description"] ?></textarea></br>
  
  <label for="code">Código</label>
  <input type="number" name="code"  value="<?php echo $product_array[$key]["code"] ?>"/></br>

  <label for="flag">Destaque?</label>
  <input type="number" name="flag"  value="<?php echo $product_array[$key]["flag"] ?>"/></br>

  <label for="tag">Tag</label>
  <input type="text" name="tag"  value="<?php echo $product_array[$key]["tag"] ?>"/></br>

  <label for="folder">Pasta</label>
  <input type="text" name="folder" value="<?php echo $product_array[$key]["upfile"] ?>"/></br>

  <label for="upfile">Imagem Destacada</label>
  <input type="file" name="highlight[]" multiple /></br>

  <label for="upfile">Imagem(s)</label>
  <input type="file" name="upfile[]" multiple /></br>

  <label for="qtd_min">Quantidade Mínima</label>
  <input type="number" name="qtd_min" value="<?php echo $product_array[$key]["qtd_min"] ?>"/></br>
  
  <label for="size">Tamanho</label>
  <input type="text" name="size" value="<?php echo $product_array[$key]["size"] ?>"/></br>

  <label for="printing">Gravação</label>
  <input type="text" name="printing" value="<?php echo $product_array[$key]["printing"] ?>"/></br>

  <label for="print_type">Tipo de Gravação</label>
  <input type="text" name="print_type" value="<?php echo $product_array[$key]["print_type"] ?>"/></br>

  <label for="comments">Comentários</label>  
  <textarea for= "comments" rows="4" cols="50" name="comments"><?php echo $product_array[$key]["comments"] ?></textarea></br>

  <label for="category">Categoria</label>
  <select type="text" name="category">
    <!--First option is the product category -->
    <option><?php echo $product_array[$key]["category"]; ?></option>
<?php  
  
	$category_array = $db_handle->runQuery("SELECT * FROM categories ORDER BY id ASC");
  
  if (!empty($category_array)) { 
		foreach($category_array as $key=>$value){			
	?>
    <!--Other category options to select -->      
		<option><?php echo $category_array[$key]["category"]; ?></option>      
<?php	
			}
  }
  
  ?>
  </select>
  <br>
  <button type="submit" value="send values">Atualizar</button>
</form>

<?php
	}
}
?>