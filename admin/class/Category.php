<?php
class Category {
  private $id;
  private $category;

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    $this->id = $value;
  }

  public function getCategory() {
    return $this->category;  
  }

  public function setCategory($value) {
    $this->category = $value;
  }

  public function setData($data) {
    $this->setId($data['id']);
    $this->setCategory($data['category']);   
  }
  
  public static function getList() {
    $sql = new Sql();
    return $sql->select("SELECT * FROM categories ORDER BY id;");
  }

  public function loadById($id) {
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM categories  WHERE id = :ID", array(
      ":ID"=>$id
    ));    
    if (count($results) > 0) {
      $this->setData($results[0]);
    }
  }

  public function __toString(){
		return json_encode(array(
			"id"=>$this->getId(),
      "category"=>$this->getCategory()      		
		));
  }
}