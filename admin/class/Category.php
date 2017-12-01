<?php
class Category {
  private $id;
  private $category;
}

public function getId() {
  return $this->id;
}

public function setId($value) {
  $this->id = $value;
}

public function getCategory() {
  return $this->category;  
}

public function setCategory() {
  $this->category = $value;
}