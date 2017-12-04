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
  
  public static function getList() {
    $sql = new Sql();
    return $sql->select("SELECT * FROM categories ORDER BY id;");
  }
}