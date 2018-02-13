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
    return $this->article;
  }

  public function setArticle($value) {
    $this->article = $value;
  }

public function setData($data) {
  $this->setId($data['id']);
  $this->setTitle($data['title']);
  $this->setArticle($data['article']); 
}

public function insert() {
  $sql = new Sql();
  $results = $sql->select("CALL sp_articles_insert(:TITLE, :ARTICLE)", array(
    ':TITLE'=>$this->getTitle(),    
    ':ARTICLE'=>$this->getArticle()    
  ));    
  if (count($results) > 0) {
    $this->setData($results[0]);
  }
}

  public function __construct($title = "", $article = ""){
    $this->setTitle($title);    
    $this->setArticle($article);      
  }
  
	public function __toString(){
		return json_encode(array(
      "title"=>$this->getTitle(),      
      "article"=>$this->getArticle()      
		));
  }
}