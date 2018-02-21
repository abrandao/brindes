<?php
  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }

  $images = scandir("../../../includes/img/slider/");

    
    foreach($images as $key=>$img){	
      if(!in_array($img, array(".", ".."))) {
        ?>    
    <div class="col-lg-4">
      <img class="img-fluid img-responsive" src="<?php echo "../../../includes/img/slider/" . $images[$key];?>"></img>
      <br>
      <?php echo $images[$key] ?>
      <br>      
      <textarea class="form-control" cols="50"><?php echo "../../../includes/img/slider/" . $images[$key]; ?></textarea>
      <hr>
    </div>
    <br>
<?php    
      }
    }
?>
<br>
<br>
<h2>TAMANHO DA IMAGEM 1280x348</h2>  
<br>
<form method="POST" action="file-upload.php" enctype="multipart/form-data">
    
  <label for="upfile">Primeira Imagem</label>
  <br>
  <input type="file" name="upfile1" multiple /></br>
  <br>
  <label for="upfile">Segunda Imagem</label>
  <br>
  <input type="file" name="upfile2" multiple /></br>

  <button type="submit" value="send values">Enviar</button>
</form>