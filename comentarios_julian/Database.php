<?php 
 
 class Database{
 private $server='localhost';
 private $db='proyectolibreria';
 private $user='root';
 private $pass='';
 private $conn;

    function conectarse()
    {
        $this->conn = mysqli_connect($this->server, $this->user, $this->pass, $this->db);
        if (mysqli_connect_error()) {
            echo "Error " . mysqli_connect();
        }
        return $this->conn;
       
    }
}


?>