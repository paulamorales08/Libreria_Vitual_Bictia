<?php
    class Database{
        private $server = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $db = 'proyectolibreria';
        private $conn;

        function conectar(){
            $this->conn = mysqli_connect($this->server, $this->username, $this->pass, $this->db);
            if (mysqli_connect_error()) {
                echo "Error" . mysqli_connect();
            }else{
                return $this->conn;
            }
        }
    }
?>