<?php
    include('Database.php');

    class Autores{
        public $idAutor;
        public $nombreAutor;
        public $conn;

        function __construct(){
            $db = new Database();
            $this->conn = $db->conectar();
        }

        function getAutor(){
            $sql = "SELECT * FROM Autores";
            return mysqli_query($this->conn, $sql);
        }
    }
?>