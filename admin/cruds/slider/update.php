<?php
  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }
  
  include_once("../../class/Sql.php");

  $db_handle = new Sql();
	$product_array = $db_handle->runQuery("SELECT * FROM slider");
    
?>

  <link rel="stylesheet" href="../../../css/bootstrap.css">
  
  <form method="POST" action="file-upload.php" enctype="multipart/form-data">

<?php

  $images = scandir("../../../includes/img/slider/");
  $slide_number = 0;
  foreach($images as $key=>$img){    
    
    if(!in_array($img, array(".", ".."))) {
?>    

  <div class="col-lg-4">
    <img class="img-fluid img-responsive" title="<?php echo $product_array[$slide_number]['title']; ?>" src="<?php echo "../../../includes/img/slider/" . $images[$key];?>"></img>
    <br>
    <?php echo $images[$key] ?>    
    <br>
    <label>ID da imagem:</label>
    <?php echo $product_array[$slide_number]['id']; ?>       
    <br>
    <label>Título da imagem:</label>
    <textarea class="form-control" cols="50" name="<?php echo 'title' .  $key; ?>" value="<?php $product_array[$slide_number]['title']; ?>"><?php echo $product_array[$slide_number]['title']; ?></textarea>
    <br>
    <label>Descrição da imagem:</label>
    <textarea class="form-control" cols="50" name="<?php echo 'alt' .  $key; ?>"><?php echo $product_array[$slide_number]['alt']; ?></textarea>
    <br>
    <label>Link da imagem:</label>
    <textarea class="form-control" cols="50" name="<?php echo 'link' .  $key; ?>"><?php echo $product_array[$slide_number]['link']; ?></textarea>
    <br>
    <label>Caminho da imagem:</label>      
    <textarea class="form-control" cols="50"><?php echo "../../../includes/img/slider/" . $images[$key]; ?></textarea>      
    <hr>
  </div>
  <br>
        
<?php    
    $slide_number++;        
      }
         
    }    
?>

  <h2>TAMANHO DA IMAGEM 1280x348</h2>  
  <br>
    
    <label for="upfile">Primeira Imagem:</label>
    <br>
    <input type="file" name="upfile1" multiple /></br>
    <br>
    <label for="upfile">Segunda Imagem:</label>
    <br>
    <input type="file" name="upfile2" multiple /></br>
    <br>
    <button class="btn btn-outline-success" type="submit" value="send   values">Enviar</button>
  </form>