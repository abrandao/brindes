<?php
  
  require_once("../admin/class/Company.php");

  $db_handle = new Sql();	
  $category_array = $db_handle->runQuery("SELECT * FROM business WHERE id = 1");
  
?>
  
  
  </body>
  <footer>
    <div class="container fixed-bottom bg-secondary p-3">
      <div class="row">        
        <div class="col-sm-3">
          <span class=""><a class="fa fa-facebook-square" style="font-size:30px; color:white; text-right" href="https://www.facebook.com/EpontualBrindes/"></a></span>
        </div>
        <div class="col-sm-3">
          
        </div>
        <div class="row col-sm-6">
          <div class="col-sm">
            <span class="text-white"><?php echo $category_array[0]["email1"] ?></span>
          </div>
          <div class="w-100"></div>
          <div class="col-sm">
            <img src="includesimg/logo_transparent.png" class="img-fluid" alt="Logo Epontual">
          </div>
        </div>        
      </div>
    </div>
  </footer>  
</html>