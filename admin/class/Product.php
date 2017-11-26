<?php
class Product {
  private $id;
  private $code;
  private $title;
  private $tag_main;
  private $tag_category;
  private $upfile;
  private $quantity_A;
  private $quantity_B;
  private $quantity_C;
  private $description;
  private $size;
  private $printing;

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    $this->id = $value;
  }

  public function getCode() {
    return $this->code;
  }

  public function setCode($value) {
    $this->code = $value;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($value) {
    $this->title = $value;
  }

  public function getTag_main() {
    return $this->tag_main;
  }

  public function setTag_main($value) {
    $this->tag_main = $value;
  }

  public function getTag_category() {
    return $this->tag_category;
  }

  public function setTag_category($value) {
    $this->tag_category = $value;
  }

  public function getUpfile() {
    return $this->upfile;
  }

  public function setUpfile($value) {
    $this->upfile = $value;
  }

  public function getQuantity_A() {
    return $this->quantity_A;
  }

  public function setQuantity_A($value) {
    $this->quantity_A = $value;
  }

  public function getQuantity_B() {
    return $this->quantity_B;
  }

  public function setQuantity_B($value) {
    $this->quantity_B = $value;
  }

  public function getQuantity_C() {
    return $this->quantity_C;
  }

  public function setQuantity_C($value) {
    $this->quantity_C = $value;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($value) {
    $this->description = $value;
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

  public function setData($data) {
    $this->setId($data['id']);
    $this->setCode($data['code']);
    $this->setTitle($data['title']);
    $this->setTag_main($data['tag_main']);
    $this->setTag_category($data['tag_category']);
    $this->setUpfile($data['upfile']);
    $this->setQuantity_A($data['quantity_A']);
    $this->setQuantity_B($data['quantity_B']);
    $this->setQuantity_C($data['quantity_C']);
    $this->setDescription($data['description']);
    $this->setSize($data['size']);
    $this->setPrinting($data['printing']);
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
    $results = $sql->select("CALL sp_products_insert(:CODE, :TITLE, :TAG_MAIN, :TAG_CATEGORY,
     :UPFILE, :QUANTITY_A, :QUANTITY_B, :QUANTITY_C, :DESCRIPTION, :SIZE, :PRINTING)", array(
      ':CODE'=>$this->getCode(),
      ':TITLE'=>$this->getTitle(),
      ':TAG_MAIN'=>$this->getTag_main(),
      ':TAG_CATEGORY'=>$this->getTag_category(),
      ':UPFILE'=>$this->getUpfile(),
      ':QUANTITY_A'=>$this->getQuantity_A(),
      ':QUANTITY_B'=>$this->getQuantity_B(),
      ':QUANTITY_C'=>$this->getQuantity_C(),
      ':DESCRIPTION'=>$this->getDescription(),
      ':SIZE'=>$this->getSize(),
      ':PRINTING'=>$this->getPrinting()
    ));    
    if (count($results) > 0) {
      $this->setData($results[0]);
    }
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

  public function __construct($code = "", $title = "", $tag_main = "", $tag_category = "",
  $upfile = "", $quantity_A = "", $quantity_B = "", $quantity_C = "", $description = "",
  $size = "", $printing = ""){
		$this->setCode($code);
    $this->setTitle($title);
    $this->setTag_main($tag_main);
    $this->setTag_category($tag_category);
    $this->setUpfile($upfile);
    $this->setQuantity_A($quantity_A);
    $this->setQuantity_B($quantity_B);
    $this->setQuantity_C($quantity_C);
    $this->setDescription($description);
    $this->setSize($size);
    $this->setPrinting($printing);
  }
  
	public function __toString(){
		return json_encode(array(
			"code"=>$this->getCode(),
      "title"=>$this->getTitle(),
      "tag_main"=>$this->getTag_main(),
      "tag_category"=>$this->getTag_category(),
      "upfile"=>$this->getUpfile(),
      "quantity_A"=>$this->getQuantity_A(),
      "quantity_B"=>$this->getQuantity_B(),
      "quantity_C"=>$this->getQuantity_C(),
      "desription"=>$this->getDescription(),
      "size"=>$this->getSize(),
      "printing"=>$this->getPrinting()		
		));
  }
}
