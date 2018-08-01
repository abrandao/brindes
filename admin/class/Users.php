<?php

  class Users {

    private $id;
    private $username;
    private $password;
    private $created_at;

    public function getId() {
      return $this->id;
    }
  
    public function setId($value) {
      $this->id = $value;
    }

    public function getUsername() {
      return $this->username;
    }
  
    public function setUsername($value) {
      $this->username = $value;
    }

    public function getPassword() {
      return $this->password;
    }
  
    public function setPassword($value) {
      $this->password = $value;
    }

    public function getCreated_at() {
      return $this->created_at;
    }
  
    public function setCreated_at($value) {
      $this->created_at = $value;
    }

    public function loadById($id) {
      $sql = new Sql();
      $results = $sql->select("SELECT * FROM users WHERE id = :ID", array(
        ":ID"=>$id
      ));    
        if (count($results) > 0) {
        $this->setData($results[0]);
      }        
    }

    public function setData($data) {
      $this->setId($data['id']);
      $this->setUsername($data['username']);
      $this->setPassword($data['password']);
      $this->setCreated_at($data['created_at']);     
    }

    public function delete() {
      $sql = new Sql();
      $sql->query("DELETE FROM users WHERE id = :ID", array(
        ":ID"=>$this->getId()
      ));
    }   

  }