<?php

class Database{
// specify database connection arguments


private $host = "localhost";
private $db_name = "cmsoop";
private $username = "root";
private $password = "";

public $conn;

// get the database connection
public function getConnection(){

    $this->conn = null; 
    $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . 
    $this->db_name, $this->username, $this->password);
    
    $this->conn->exec("SET NAMES utf8");

    return $this->conn;
    }
}
?>