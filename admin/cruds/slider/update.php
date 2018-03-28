<?php
  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }
  
  include_once("../../class/Sql.php");  
  
?>

<link rel="stylesheet" href="../../../css/bootstrap.css">
  


<?php  
  
  $db_handle = new Sql();

  $slider_id = $_GET['id'];

  $slider_array = $db_handle->runQuery("SELECT * FROM slider WHERE id = '$slider_id'");

  if (!empty($slider_array)) {
    foreach($slider_array as $key=>$value) {
?> 
  <form method="POST" action="file-update.php" enctype="multipart/form-data">   
    <br>
    <div class="col-lg-4">

    <label>ID da imagem:</label>
    <textarea name="id" readonly><?php echo $slider_array[$key]['id']; ?></textarea> 
    <br>
    
    <img class="img-fluid img-responsive" title="<?php echo $slider_array['title']; ?>" src="<?php echo '../../../includes/img/slider/' . $slider_array[$key]['title'] . '.jpeg';?>"></img>
    <br>

    <label>Título da imagem:</label>
    <textarea class="form-control" cols="50" name="title"><?php echo $slider_array[$key]['title']; ?></textarea>
    <br>

    <label>Descrição da imagem:</label>
    <textarea class="form-control" cols="50" name="alt"><?php echo $slider_array[$key]['alt']; ?></textarea>
    <br>

    <label>Link da imagem:</label>
    <textarea class="form-control" cols="50" name="link"><?php echo $slider_array[$key]['link']; ?></textarea>
    <br>

    <label>Caminho da imagem:</label>      
    <textarea class="form-control" cols="50"><?php echo "../../../includes/img/slider/" . $slider_array[$key]['title'] . ".jpeg"; ?></textarea>      
    <hr>

  </div>
  <br>

  <h2>TAMANHO DA IMAGEM 1280x348</h2>  
  <br>
    
    <label for="upfile">Nova Imagem:</label>
    <br>
    <input type="file" name="upfile" multiple /></br>
    <br>    
    <button class="btn btn-outline-success" type="submit" value="send   values">Enviar</button>
  </form>

  <?php
    }
  }
  ?>