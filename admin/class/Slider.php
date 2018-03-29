<?php
class Slider {
  private $id;
  private $title;
  private $alt;
  private $link;

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

  public function getAlt() {
    return $this->alt;
  }

  public function setAlt($value) {
    $this->alt = $value;
  }
  
  public function getLink() {
    return $this->link;
  }

  public function setLink($value) {
    $this->link = $value;
  }

  public function setData($data) {
    $this->setId($data['id']);
    $this->setTitle($data['title']);
    $this->setAlt($data['alt']);
    $this->setLink($data['link']);  
  }

  public function insert() {
    $sql = new Sql();
    $results = $sql->select("CALL sp_slider_insert(:TITLE, :ALT, :LINK)", array(
      ':TITLE'=>$this->getTitle(),
      ':ALT'=>$this->getAlt(),
      ':LINK'=>$this->getLink()      
    ));    
    if (count($results) > 0) {
      $this->setData($results[0]);
    }
  }

  public function update( $id, $title, $alt, $link){
    $this->setId($id);
    $this->setTitle($title);
    $this->setAlt($alt);
    $this->setLink($link);    
    
		$sql = new Sql();
		$sql->query("UPDATE slider SET title = :TITLE, alt = :ALT, link = :LINK WHERE id = :ID", array(
      ':TITLE'=>$this->getTitle(),
      ':ALT'=>$this->getAlt(),
      ':LINK'=>$this->getLink(),      
      ':ID'=>$this->getId()
		));
  }

  public function loadById($id) {
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM slider WHERE id = :ID", array(
      ":ID"=>$id
    ));    
    if (count($results) > 0) {
      $this->setData($results[0]);
    }        
  }

  public function delete() {
    $sql = new Sql();
    $sql->query("DELETE FROM slider WHERE id = :ID", array(
      ":ID"=>$this->getId()
    ));
  }

  public function deleteImage($id) {
    
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM slider WHERE id = :ID", array(
      ":ID"=>$id      
    ));

    if (count($results) > 0) {
      $this->setData($results[0]);
    }      

    $img = $results[0]['title'];    
    
    unlink("../../../includes/img/slider/" . $img . ".jpeg");
  }

  public function __construct($title = "", $alt = "", $link = ""){
    $this->setTitle($title);
    $this->setAlt($alt);
    $this->setLink($link);       
  }
}