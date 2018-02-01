<?php
class DatabaseOnFilm{

    private $host = "localhost";
    private $username = "root";
    private $password = "";

    private $conn;

    function connect(){
       $this->conn = mysqli_connect($this->host,$this->username,$this->password);
       return $this->conn;
    }
}