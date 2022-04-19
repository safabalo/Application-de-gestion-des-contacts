<?php

class dataBase {
  public $username;
  public $password;

  public function __construct($username = "root", $password = '') {
    $this->username = $username;
    $this->password = $password;
  }
  
  public function connect() {
    try {
      $conn = new PDO("mysql:host=localhost;dbname=mycontdb", $this->username, $this->password);
      return $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage()."</br>";
      die();
    }
  }
}



?>