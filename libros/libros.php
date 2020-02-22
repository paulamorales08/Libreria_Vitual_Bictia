<?php
    include_once('../Conn/Database.php');

    class Libros{

        public $idLibro;
        public $nombreLibro;
        public $descripcion;
        public $fechaPublicacion;
        public $precio;
        public $idAutor;
        public $idEditorial;
        public $idCategoria;
        public $estado;
        public $conn;
        
        function __construct(){  
            $db = new Databse();
            $this->conn = $db->connectToDatabase();
        }

        function crearLibro($data){
            $nombreLibro = $data['libro'];
            $descripcion = $data['descripcion'];
            $fechaPublicacion = $data['fechaPublicacion'];
            $precio = $data['precio'];
            $estado = $data['estado'];
            $idAutor = $data['idAutor'];
            $idEditorial = $data['idEditorial'];
            $idCategoria = $data['idCategoria'];
                    
            $sql = "INSERT INTO libros 
                    (nombreLibro, descripcion, fechaPublicacion, precio, estado, idEditorial, idAutor, idCategoria) 
                    VALUES 
                    ('$nombreLibro', '$descripcion', '$fechaPublicacion', '$precio', '$estado', '$idEditorial', '$idAutor', '$idCategoria')";
            
            $res = mysqli_query($this->conn, $sql);

            if ($res) {
                return $nombreLibro;
                return true;
            }else{
                return false;
            }
        }

        function getLibros(){
            $sql = "SELECT * FROM Libros";
            return mysqli_query($this->conn, $sql);
        }

        function getLibro($idLibro){
            $sql = "SELECT * FROM Libros WHERE idLibro=$idLibro";
            return mysqli_fetch_object(mysqli_query($this->conn, $sql));
        }

        function updateLibro($data){
            $idLibro = $data['idLibro'];
            $libro = $data['libro'];
            $descripcion = $data['descripcion'];
            $fechaPublicacion = $data['fechaPublicacion'];
            $precio = $data['precio'];
            $estado = $data['estado'];
            $autor = $data['idAutor'];
            $editorial = $data['idEditorial'];
            $categoria = $data['idCategoria'];
           

            $sql = "UPDATE Libros SET nombreLibro = '$libro', descripcion = '$descripcion', fechaPublicacion = '$fechaPublicacion', 
                                      fechaPublicacion = '$fechaPublicacion', precio = '$precio', estado = '$estado', idEditorial = '$editorial',
                                      idAutor = '$autor', idCategoria = '$categoria'
                    WHERE idLibro = '$idLibro' ";
            mysqli_query($this->conn, $sql);

            if ($sql) {
                return true;
            }else{
                return false;
            }
        }

    }

    //Editoriales

    class Editoriales{
        public $idEditorial;
        public $nombreEditorial;
        public $conn;

        function __construct(){
            $db = new Databse();
            $this->conn = $db->connectToDatabase();
        }

        function getEditorial($idEditorial){
            $sql = "SELECT * FROM editoriales WHERE idEditorial=$idEditorial";
            return mysqli_fetch_object(mysqli_query($this->conn, $sql));
        }

        function getAllEditoriales(){
            $sql = "SELECT * FROM editoriales ORDER BY nombreEditorial";
            return mysqli_query($this->conn, $sql);
        }
    }

    //Autores

    class Autores{
        public $idAutor;
        public $nombreAutor;
        public $conn;

        function __construct(){
            $db = new Databse();
            $this->conn = $db->connectToDatabase();
        }

        function getAutor($idAutor){
            $sql = "SELECT * FROM autores WHERE idAutor=$idAutor";
            return mysqli_fetch_object(mysqli_query($this->conn, $sql));
        }

        function getAllAutores(){
            $sql = "SELECT * FROM autores ORDER BY nombreAutor";
            return mysqli_query($this->conn, $sql);
        }
    }
?>