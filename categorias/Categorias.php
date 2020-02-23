<?php 

class Categoria {
    public $idCategoria;
    public $nombreCategoria;
    public $descripcion;
    public $estado;
    public $cat;
    public $conn;
    public $root = ROOT;
    public $path = PATH;

    function __construct()
    {
        $db = new Databse();
        $this->conn = $db->connectToDatabase();
    }

    function crearCategorias($data){
        $nombreCategoria = $data['nombreCategoria'];
        $descripcion = $data['descripcion'];
        $estado = $data['estado'];
      

        $sql = "INSERT INTO categorias (nombreCategoria,descripcion,estado) VALUES ('$nombreCategoria','$descripcion','$estado')";
        $respuesta = mysqli_query($this->conn,$sql);

        if ($respuesta) {
            return true;
        } else {
            return false;
        }
    }

    function obtenerCategorias(){
        $sql = "SELECT * FROM categorias ORDER BY nombreCategoria";
        return  mysqli_query($this->conn,$sql);
    }

    function obtenerCategoria($idCategoria){
        $sql = "SELECT * FROM categorias WHERE idCategoria=$idCategoria";
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    function modificarCategoria($data){
        $idCategoria = $data['idCategoria'];
        $nombreCategoria = $data['nombreCategoria'];
        $descripcion = $data['descripcion'];
        $estado = $data['estado'];

        $sql = "UPDATE `categorias` SET `nombreCategoria` = '$nombreCategoria', `estado` = '$estado', `descripcion` = '$descripcion' WHERE `categorias`.`idCategoria` = $idCategoria";

        $update = mysqli_query($this->conn,$sql);
        if ($update) {
            return true;
        }else{
            return false;
        }
    }

    function filtroCategorias($consulta){
        //$sql = "SELECT * FROM categorias WHERE idCategoria = $idCategoria";
        $sql = "SELECT * FROM categorias WHERE nombreCategoria LIKE '%$consulta%'";
        return mysqli_query($this->conn, $sql);
    }

    function filtroLibrosCategoria($idCategoria){
        $sql = "SELECT * FROM libros WHERE idCategoria = $idCategoria";
        //$sql = "SELECT * FROM categorias WHERE nombreCategoria LIKE '%$consulta%'";
        return mysqli_query($this->conn, $sql);
    }
}

?>