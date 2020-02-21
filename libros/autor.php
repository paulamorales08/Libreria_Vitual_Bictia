<?php
    include_once('../Conn/Database.php');

    class Autores{
        public $idAutor;
        public $nombreAutor;
        public $conn;

        function __construct(){
            $db = new Databse();
            $this->conn = $db->connectToDatabase();
        }

        function getAutor(){
            $sql = "SELECT * FROM autores";
            return mysqli_query($this->conn, $sql);
        }

        function getAllAutores(){
            $sql = "SELECT * FROM autores ORDER BY nombreAutor";
            return mysqli_query($this->conn, $sql);
        }
    }
?>