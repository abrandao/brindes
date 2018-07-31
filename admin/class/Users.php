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

  }