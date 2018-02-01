<?php

require_once("../../class/Product.php");
require_once("../../class/Sql.php");

$id = $_POST['id'];
$title = $_POST['title'];
$code = $_POST['code'];
$flag = $_POST['flag'];
$tag = $_POST['tag'];
$category = $_POST['category'];
$description = $_POST['description'];
$dirUploads = "../../products/" . $_POST['folder'];
$upfile = $_POST['folder'];
$qtd_min = $_POST['qtd_min'];
$size = $_POST['size'];
$printing = $_POST['printing'];
$print_type = $_POST['print_type'];
$comments = $_POST['comments'];

$renamed_folder = $_POST['renamefolder'];

//Updating product
$product = new Product( $title, $code, $flag, $tag, $category, $description, $upfile, $qtd_min, $size, $printing, $print_type, $comments);
$product->loadById($id);
$product->update($title, $code, $flag, $tag, $category, $description, $upfile, $qtd_min, $size, $printing, $print_type, $comments);

if ($renamed_folder != $upfile) {  
  rename("../../products/" . $renamed_folder,"../../products/" . $upfile);
  echo $upfile;
  echo "<br>";
  $files = glob("../../products/" . $upfile . "/*.*");
      for ($i=1; $i<count($files); $i++)
      {	
        $num = $files[$i];       
          
        if (substr($num, -6,6) == "_0.jpg") {
          
          rename($num,"../../products/" . $upfile . "/" . $upfile . "_0.jpg" );
                  
        } 
              
      } 
  echo "<br>";
  
} 

?>

<h1>Produto editado com sucesso!</h1>
<p>ID:<? echo " " .  $id; ?></p>
<p>Título:<? echo " " . $title; ?></p>
<p>Código:<? echo " " . $code; ?></p> 
<p>Destaque:<? echo " " . $flag; ?></p>
<p>Tag:<? echo " " . $tag; ?></p> 
<p>Categoria:<? echo " " . $category; ?></p> 
<p>Descrição:<? echo " " . $description; ?></p> 
<p>Nome da Pasta:<? echo " " . $dirUploads; ?></p> 
<p>Quantidade Mínima:<? echo " " . $qtd_min; ?></p> 
<p>Tamanho:<? echo " " . $size; ?></p> 
<p>Impressão:<? echo " " . $printing; ?></p> 
<p>Tipo de Impressão:<? echo " " . $print_type; ?></p> 
<p>Comentários:<? echo " " . $comments; ?></p>
<a href="list.php">Retornar à lista de produtos</a>