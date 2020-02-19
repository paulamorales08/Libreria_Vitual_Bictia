<?php
    include('Database.php');

    class Libros{

        public $idLibro;
        public $nombreLibro;
        public $descripcion;
        public $fechaPublicacion;
        public $precio;
        
        function __construct(){  
            $db = new Database();
            $this->conn = $db->conectar();
        }

        function crearLibro($data){
            $libro = $data['libro'];
            $descripcion = $data['descripcion'];
            $autor = $data['autor'];
            $fechaPublicacion = $data['fechaPublicacion'];
            $precio = $data['precio'];

            $sql = "INSERT INTO Libros (nombreLibro, descripcion, autor, fechaPublicacion, precio) 
                    VALUES ('$libro', '$descripcion', '$autor', '$fechaPublicacion', '$precio')";
            
            $res = mysqli_query($this->conn, $sql);

            if ($res) {
                return true;
            }else{
                return false;
            }
        }

        function getAllLibros(){
            $sql = "SELECT * FROM Libros";
            return mysqli_query($this->conn, $sql);
        }

        function getLibros($idLibro){
            $sql = "SELECT * FROM Libros WHERE id=$idLibro";
            return mysqli_fetch_object(mysqli_query($this->conn, $sql));
        }

        function updateLibro($data, $idLibro){
            $libro = $data['libro'];
            $descripcion = $data['descripcion'];
            $autor = $data['autor'];
            $fechaPublicacion = $data['fechaPublicacion'];
            $precio = $data['precio'];

            $sql = "UPDATE Libros SET nombreLibro = '$libro', descripcion = '$descripcion', autor = '$autor', fechaPublicacion = '$fechaPublicacion', precio = '$precio' 
                    WHERE id = '$idLibro' ";
        }
    }
?>