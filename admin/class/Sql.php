<?php
  class Sql extends PDO {
    private $conn;
    public function __construct(){
         $this->conn = new PDO("mysql:host=localhost;dbname=brindes","brandao","sistema");
    }            
  }