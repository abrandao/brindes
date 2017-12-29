<?php
  require_once("../class/Category.php");
  require_once("../class/Sql.php");

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }
?>

<form method="POST" action="file-upload.php" enctype="multipart/form-data">
  
  <label for="title">Título</label>
  <input type="text" name="title" /></br>
  
  <label for="code">Código</label>
  <input type="number" name="code" /></br>

  <label for="tag">Tag</label>
  <input type="text" name="tag" /></br>

  <label for="category">Categoria</label>
  <select type="text" name="category">
<?php
  $db_handle = new Sql();
	$category_array = $db_handle->runQuery("SELECT * FROM categories ORDER BY id ASC");
	if (!empty($category_array)) { 
		foreach($category_array as $key=>$value){			
	?>      
			<option><?php echo $category_array[$key]["category"]; ?></option>
<?php	
			}
	}
  ?>
  </select>  
  <br>

  <label for="description">Descrição</label><br>  
  <textarea for= "description" rows="4" cols="50" name="description"> 
  Descreva o produto...</textarea></br>

  <label for="folder">Pasta</label>
  <input type="text" name="folder" /></br>

  <label for="upfile">Imagem(s)</label>
  <input type="file" name="upfile[]" multiple /></br>

  <label for="qtd_min">Quantidade Mínima</label>
  <input type="number" name="qtd_min" /></br>

  <label for="qtd1">Quantidade 01</label>
  <input type="number" name="qtd1" /></br>

  <label for="qtd2">Quantidade 02</label>
  <input type="number" name="qtd2" /></br>

  <label for="qtd3">Quantidade 03</label>
  <input type="number" name="qtd3" /></br>
  
  <label for="size">Tamanho</label>
  <input type="text" name="size" /></br>

  <label for="printing">Gravação</label>
  <input type="text" name="printing" /></br>

  <label for="print_type">Tipo de Gravação</label>
  <input type="text" name="print_type" /></br>

  <label for="comments">Comentários</label>  
  <textarea for= "comments" rows="4" cols="50" name="comments"> 
  Deixe um comentário</textarea></br>

  <button type="submit" value="send values">Enviar</button>
</form>