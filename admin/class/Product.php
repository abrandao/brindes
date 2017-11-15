<?php
class Product {
  private $code;
  private $title;

  public function getCode() {
    return $this->code;
  }

  public function setCode($code) {
    $this->code = $value;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($title) {
    $this->title = $value;
  }

  //Inserting only two vaues for testing purposes
  public function setData($data) {
    $this->setCode($data['code']);
    $this->setTitle($data['title']);
  }

  public function insert() {
    $sql = new Sql();
    $results = $sql->select("CALL sp_products_insert(:CODE, :TITLE)", array(
      ':CODE'=>$this->getCode(),
      ':TITLE'=>$this->getTitle()
    ));    
    if (count($results) > 0) {
      $this->setData($results[0]);
    }
  }

  public function __construct($code = "", $title = ""){
		$this->setCode($code);
		$this->setTitle($title);
  }
  
	public function __toString(){
		return json_encode(array(
			"code"=>$this->getCode(),
			"title"=>$this->getTitle()		
		));
  }
}