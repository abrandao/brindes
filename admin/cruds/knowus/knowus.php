<?php

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }

  require_once("../../class/Sql.php");
  require_once("../../class/Knowus.php");

  $db_handle = new Sql();	
  $article_array = $db_handle->runQuery("SELECT * FROM knowus");  

  if (!empty($article_array)) { 
		foreach($article_array as $key=>$value){
  
      $title = $article_array[$key]['title'];
      $article = $article_array[$key]['article'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Editar texto</title>
		<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  </head>
	<body>	

      <form method="POST" action="knowus-update.php" enctype="multipart/form-data">
        <div>
          <label for="title">Título:</label>
        </div>
        <div>
          <input type="text" name="title" value="<?php echo $title ?>"/>
        </div>
        </br> 
        <div>  
          <label for="article">Artigos:</label>  
        </div>
        <div>  
          <textarea name="article" id="editor1"><?php echo $article; ?></textarea>
          <script>
			CKEDITOR.replace( 'editor1' );
		</script>
        </div>
        </br>  
        <div>
          <button type="submit" value="send values">Enviar</button>
        </div>
      </form>

  </body>
</html>  

<?php
    }
  }