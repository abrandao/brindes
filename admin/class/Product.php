<?php
class Product {
  private $id;
  private $title;
  private $code;  
  private $tag;
  private $category;
  private $description;
  private $upfile;
  private $qtd_min;
  private $qtd1;
  private $qtd2;
  private $qtd3;  
  private $size;
  private $printing;
  private $print_type;
  private $comments;

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    $this->id = $value;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($value) {
    $this->title = $value;
  }

  public function getCode() {
    return $this->code;
  }

  public function setCode($value) {
    $this->code = $value;
  }

  public function getTag() {
    return $this->tag;
  }

  public function setTag($value) {
    $this->tag = $value;
  }

  public function getCategory() {
    return $this->category;
  }

  public function setCategory($value) {
    $this->category = $value;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($value) {
    $this->description = $value;
  }

  public function getUpfile() {
    return $this->upfile;
  }

  public function setUpfile($value) {
    $this->upfile = $value;
  }

  public function getQtd_min() {
    return $this->qtd_min;
  }

  public function setQtd_min($value) {
    $this->qtd_min = $value;
  }

  public function getQtd1() {
    return $this->qtd1;
  }

  public function setQtd1($value) {
    $this->qtd1 = $value;
  }

  public function getQtd2() {
    return $this->qtd2;
  }

  public function setQtd2($value) {
    $this->qtd2 = $value;
  }

  public function getQtd3() {
    return $this->qtd3;
  }

  public function setQtd3($value) {
    $this->qtd3 = $value;
  }
  
  public function getSize() {
    return $this->size;
  }

  public function setSize($value) {
    $this->size = $value;
  }

  public function getPrinting() {
    return $this->printing;
  }

  public function setPrinting($value) {
    $this->printing = $value;
  }

  public function getPrint_type() {
    return $this->print_type;
  }

  public function setPrint_type($value) {
    $this->print_type = $value;
  }

  public function getComments() {
    return $this->comments;
  }

  public function setComments($value) {
    $this->comments = $value;
  }

  public function setData($data) {
    $this->setId($data['id']);
    $this->setTitle($data['title']);
    $this->setCode($data['code']);    
    $this->setTag($data['tag']);
    $this->setCategory($data['category']);
    $this->setDescription($data['description']);
    $this->setUpfile($data['upfile']);
    $this->setQtd_min($data['qtd_min']);    
    $this->setQtd1($data['qtd1']);
    $this->setQtd2($data['qtd2']);
    $this->setQtd3($data['qtd3']);    
    $this->setSize($data['size']);
    $this->setPrinting($data['printing']);
    $this->setPrint_type($data['print_type']);
    $this->setComments($data['comments']);
  }

  public function loadById($id) {
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM products WHERE id = :ID", array(
      ":ID"=>$id
    ));    
    if (count($results) > 0) {
      $this->setData($results[0]);
    }        
  }

  public function insert() {
    $sql = new Sql();
    $results = $sql->select("CALL sp_products_insert(:TITLE, :CODE, :TAG, :CATEGORY, :DESCRIPTION,
     :UPFILE, :QTD_MIN, :QTD1, :QTD2, :QTD3, :SIZE, :PRINTING, :PRINT_TYPE, :COMMENTS)", array(
      ':TITLE'=>$this->getTitle(),
      ':CODE'=>$this->getCode(),
      ':TAG'=>$this->getTag(),     
      ':CATEGORY'=>$this->getCategory(),
      ':DESCRIPTION'=>$this->getDescription(),
      ':UPFILE'=>$this->getUpfile(),
      ':QTD_MIN'=>$this->getQtd_min(),
      ':QTD1'=>$this->getQtd1(),
      ':QTD2'=>$this->getQtd2(),
      ':QTD3'=>$this->getQtd3(),      
      ':SIZE'=>$this->getSize(),
      ':PRINTING'=>$this->getPrinting(),
      ':PRINT_TYPE'=>$this->getPrint_type(),
      ':COMMENTS'=>$this->getComments(),
    ));    
    if (count($results) > 0) {
      $this->setData($results[0]);
    }
  }

  public function update($tag){
		$this->setTag($tag);
		$sql = new Sql();
		$sql->query("UPDATE products SET TAG = :TAG WHERE id = :ID", array(
			':TAG'=>$this->getTag()
		));
	}

  public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM products ORDER BY id;");
	}

  public function delete() {
    $sql = new Sql();
    $sql->query("DELETE FROM products WHERE id = :ID", array(
      ":ID"=>$this->getId()
    ));
  }    
   
  public function deleteImages($id) {
    
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM products WHERE id = :ID", array(
      ":ID"=>$id      
    ));

    if (count($results) > 0) {
      $this->setData($results[0]);
    }      

    $folder = $results[0]['upfile'];    
       
    foreach (scandir("products/" . $folder . "/") as $item) {
      if(!in_array($item, array(".", ".."))) {
        unlink("products/" . $folder . "/" . $item);
      } 
    }
    rmdir("products/" . $folder . "/");
  }  

  public function __construct($title = "", $code = "", $tag = "", $category = "", $description = "",
  $upfile = "", $qtd_min = "", $qtd1 = "", $qtd2 = "", $qtd3 = "", $size = "", $printing = "", 
  $print_type = "", $comments = ""){
    $this->setTitle($title);
    $this->setCode($code);    
    $this->setTag($tag);
    $this->setCategory($category);
    $this->setDescription($description);
    $this->setUpfile($upfile);
    $this->setQtd_min($qtd_min);
    $this->setQtd1($qtd1);
    $this->setQtd2($qtd2);
    $this->setQtd3($qtd3);    
    $this->setSize($size);
    $this->setPrinting($printing);
    $this->setPrint_type($print_type);
    $this->setComments($comments);
  }
  
	public function __toString(){
		return json_encode(array(
      "title"=>$this->getTitle(),
      "code"=>$this->getCode(),      
      "tag"=>$this->getTag(),
      "category"=>$this->getCategory(),
      "description"=>$this->getDescription(),
      "upfile"=>$this->getUpfile(),
      "qtd_min"=>$this->getQtd_min(),
      "qtd1"=>$this->getQtd1(),
      "qtd2"=>$this->getQtd2(),
      "qtd3"=>$this->getQtd3(),      
      "size"=>$this->getSize(),
      "printing"=>$this->getPrinting(),
      "print_type"=>$this->getPrint_type(),
      "comments"=>$this->getComments()
		));
  }
}
