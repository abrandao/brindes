<?php
  class Sql extends PDO {
    
    private $conn;
    
    public function __construct(){
         $this->conn = new PDO("mysql:host=localhost;dbname=brindes", "brandao","sistema");
    }

    private function setParams($statement, $parameters = array()) {
      foreach ($parameters as $key => $value) {
        $this->setParam($statement, $key, $value);
      }
    }

    private function setParam($statement, $key, $value) {      
      $statement->bindParam($key, $value);
    }

    public function query($rawQuery, $params = array()) {
      $stmt = $this->conn->prepare($rawQuery);
      $this->setParams($stmt, $params);
      $stmt->execute();
      return $stmt;
    }

    public function select($rawQuery, $params = array()):array {   
      $stmt = $this->query($rawQuery, $params);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function runQuery($query) {
      $myConnection= mysqli_connect("localhost","brandao","sistema") or die ("could not connect to mysql"); 
      mysqli_select_db($myConnection, "brindes") or die ("no database");
      
      $result = mysqli_query($myConnection,$query);
      while($row=mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
      }		
      if(!empty($resultset))
        return $resultset;
    }
    
    public function numRows($query) {
      $result  = mysqli_query($this->conn,$query);
      $rowcount = mysqli_num_rows($result);
      return $rowcount;	
    }
  }