<?php

class Knowus {
  private $id;
  private $title;
  private $article;

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

  public function getArticle() {
    return $this->id;
  }

  public function setArticle($value) {
    $this->article = $value;
  }
}

public function setData($data) {
  $this->setId($data['id']);
  $this->setTitle($data['title']);
  $this->setCode($data['code']);
  $this->setFlag($data['flag']);    
  $this->setTag($data['tag']);
  $this->setCategory($data['category']);
  $this->setDescription($data['description']);
  $this->setUpfile($data['upfile']);
  $this->setQtd_min($data['qtd_min']);        
  $this->setSize($data['size']);
  $this->setPrinting($data['printing']);
  $this->setPrint_type($data['print_type']);
  $this->setComments($data['comments']);
}

public function insert() {
  $sql = new Sql();
  $results = $sql->select("CALL sp_products_insert(:TITLE, :CODE, :FLAG, :TAG, :CATEGORY, :DESCRIPTION,
   :UPFILE, :QTD_MIN, :SIZE, :PRINTING, :PRINT_TYPE, :COMMENTS)", array(
    ':TITLE'=>$this->getTitle(),
    ':CODE'=>$this->getCode(),
    ':FLAG'=>$this->getFlag(),
    ':TAG'=>$this->getTag(),     
    ':CATEGORY'=>$this->getCategory(),
    ':DESCRIPTION'=>$this->getDescription(),
    ':UPFILE'=>$this->getUpfile(),
    ':QTD_MIN'=>$this->getQtd_min(),      
    ':SIZE'=>$this->getSize(),
    ':PRINTING'=>$this->getPrinting(),
    ':PRINT_TYPE'=>$this->getPrint_type(),
    ':COMMENTS'=>$this->getComments(),
  ));    
  if (count($results) > 0) {
    $this->setData($results[0]);
  }
}