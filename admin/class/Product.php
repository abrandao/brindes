<?php
class Product {
  private $code;
  private $title;
  private $tag_main;
  private $tag_category;
  private $filename;
  private $quantity_A;
  private $quantity_B;
  private $quantity_C;
  private $description;
  private $size;
  private $printing;

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

  public function getFilename() {
    return $this->filename;
  }

  public function setFilename($value) {
    $this->filename = $value;
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

  //Inserting only two values for testing purposes
  public function setData($data) {
    $this->setCode($data['code']);
    $this->setTitle($data['title']);
    $this->setCode($data['tag_main']);
    $this->setCode($data['tag_category']);
    $this->setCode($data['filename']);
    $this->setCode($data['quantity_A']);
    $this->setCode($data['quantity_B']);
    $this->setCode($data['quantity_C']);
    $this->setCode($data['description']);
    $this->setCode($data['size']);
    $this->setCode($data['printing']);
  }

  public function insert() {
    $sql = new Sql();
    $results = $sql->select("CALL sp_products_insert(:CODE, :TITLE, :TAG_MAIN, :TAG_CATEGORY,
     :FILENAME, :QUANTITY_A, :QUANTITY_B, :QUANTITY_C, :DESCRIPTION, :SIZE, :PRINTING)", array(
      ':CODE'=>$this->getCode(),
      ':TITLE'=>$this->getTitle(),
      ':TAG_MAIN'=>$this->getTag_main(),
      ':TAG_CATEGORY'=>$this->getTag_category(),
      ':FILENAME'=>$this->getFilename(),
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

  public function __construct($code = "", $title = "", $tag_main = "", $tag_category = "",
  $filename = "", $quantity_A = "", $quantity_B = "", $quantity_C = "", $description = "",
  $size = "", $printing = ""){
		$this->setCode($code);
    $this->setTitle($title);
    $this->setTag_main($tag_main);
    $this->setTag_category($tag_category);
    $this->setFilename($filename);
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
      "filename"=>$this->getFilename(),
      "quantity_A"=>$this->getQuantity_A(),
      "quantity_B"=>$this->getQuantity_B(),
      "quantity_C"=>$this->getQuantity_C(),
      "desription"=>$this->getDescription(),
      "size"=>$this->getSize(),
      "printing"=>$this->getPrinting()		
		));
  }
}
