<?php

 // Initialize the session
 session_start();
 // If session variable is not set it will redirect to login page
 if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
   header("location: ../../login/login.php");
   exit;
 }
  require_once("../../class/Sql.php"); 

  //Products listening
  $db_handle = new Sql();
  $product_array = $db_handle->runQuery("SELECT * FROM products");

  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){          
?>
		
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  
    <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
    <div class="row">
      <div class="col-sm">
        <img class="col-sm" src="<?php echo "../../products/" .  $product_array[$key]["upfile"] . "/" . $product_array[$key]["upfile"] . "_0.jpg"; ?>">
      </div>     
      <div class="col-sm">
        <?php echo "Título:<br>" . $product_array[$key]["title"]; ?>
      </div>
      <div class="col-sm">
        <?php echo "Código:<br>" . $product_array[$key]["code"]; ?>
      </div>
      <div class="col-sm">
        <?php echo "Tag:<br>" . $product_array[$key]["tag"]; ?>
      </div>
      <div class="col-sm">
		    <?php echo "Categoria:<br>" . $product_array[$key]["category"]; ?>
      </div>
      <div class="col-sm">
		    <?php echo "Tamanho:<br>" . $product_array[$key]["size"]; ?>
      </div>
      <div class="col-sm">
		    <?php echo "Impressão:<br>" . $product_array[$key]["printing"]; ?>
      </div>
      <div class="col-sm">
		    <?php echo "Tipo de impressão:<br>" . $product_array[$key]["print_type"]; ?>
      </div>
      <div class="col-sm">
		    <?php echo "Descrição:<br>" . $product_array[$key]["description"]; ?>
      </div>
      <div class="col-sm">
		    <?php echo "Comentários:<br>" . $product_array[$key]["comments"]; ?>
      </div>
    </div>  
    </form>    
  </div>		

<?php
		}
}
?>
</div>