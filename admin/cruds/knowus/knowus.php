<?php

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CKEditor</title>
		<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
	</head>
	<body>
		
	

      <form method="POST" action="knowus-upload.php" enctype="multipart/form-data">
        <div>
          <label for="title">Título:</label>
        </div>
        <div>
          <input type="text" name="title" />
        </div>
        </br> 
        <div>  
          <label for="article">Artigos:</label>  
        </div>
        <div>  
          <textarea name="article" id="editor">Escreva aqui.</textarea>
          <script>
			      ClassicEditor
				    .create( document.querySelector( '#editor' ) )
				    .then( editor => {
				    	console.log( editor );
				    } )
				    .catch( error => {
				    	console.error( error );
				    } );
		      </script>
        </div>
        </br>  
        <div>
          <button type="submit" value="send values">Enviar</button>
        </div>
      </form>

  </body>
</html>