<?php
require_once("admin/session.php");
require_once("includes/head.php");
require_once("includes/navbar.php");
require_once("includes/pagination.php");
require_once("admin/class/Sql.php");
?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-3 black">      
  <?php	
    	//Retrieving category list
	    $db_handle = new Sql();
		  $category_array = $db_handle->runQuery("SELECT * FROM categories ORDER BY id ASC");
		  if (!empty($category_array)) { 
		  	foreach($category_array as $key=>$value){			
      echo $category_array[$key]["category"];
				}
    }
    ?>
    </div>
    <div class="col-lg-9 yellow">
      One of three columns
    </div>        
  </div>
</div>

