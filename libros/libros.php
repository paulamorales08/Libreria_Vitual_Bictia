<?php
    include('Database.php'); 
    include('autor.php');

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
            $db = new Database();
            $this->conn = $db->conectar();
        }

        function crearLibro($data){
            $nombreLibro = $data['libro'];
            $descripcion = $data['descripcion'];
            $fechaPublicacion = $data['fechaPublicacion'];
            $precio = $data['precio'];
            $idAutor = $data['idAutor'];
            $idEditorial = $data['idEditorial'];
            $idCategoria = $data['idCategoria'];
            $estado = $data['estado'];

            $sql = "INSERT INTO Libros (nombreLibro, descripcion, fechaPublicacion, precio, estado, idEditorial, idAutor, idCategoria) 
                    VALUES ('$nombreLibro', '$descripcion', '$fechaPublicacion', '$precio', '$estado', '$idEditorial', '$idAutor', '$idCategoria')";
            
            $res = mysqli_query($this->conn, $sql);

            if ($res) {
                return $nombreLibro;
                return true;
            }else{
                return false;
            }
        }

        function getLibros($nombreLibro){
            $sql = "SELECT * FROM Libros";
            return mysqli_query($this->conn, $sql);
        }

        function getLastLibro(){
            $sql = "SELECT * FROM Libros ORDER BY idLibro DESC";
            return mysqli_fetch_object(mysqli_query($this->conn, $sql));
        }

        /*function updateLibro($data, $idLibro){
            $idLibro = $data['idLibro'];
            $libro = $data['libro'];
            $descripcion = $data['descripcion'];
            $autor = $data['autor'];
            $fechaPublicacion = $data['fechaPublicacion'];
            $precio = $data['precio'];

            $sql = "UPDATE Libros SET nombreLibro = '$libro', descripcion = '$descripcion', autor = '$autor', fechaPublicacion = '$fechaPublicacion', precio = '$precio' 
                    WHERE id = '$idLibro' ";
        }*/
    }
?>