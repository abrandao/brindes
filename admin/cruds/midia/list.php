<?php

  // Initialize the session
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: ../login/login.php");
    exit;
  }

    $images = scandir("../../../includes/img/midia/");

    //echo json_encode($images);
    
    foreach($images as $key=>$img){	
      if(!in_array($img, array(".", ".."))) {
      echo $images[$key];
      echo "<br>";

?>
      <img src="<?php echo "../../../includes/img/midia/" . $images[$key]; ?>">
<?php
      }
		}     