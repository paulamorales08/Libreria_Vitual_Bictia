<?php 

class Categoria {
    public $id;
    public $nombre;
    public $descripcion;
    public $status;

    function __construct()
    {
        
    }

    function crearCategorias($data){
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $estado = $data['estado'];

        $sql = "INSERT INTO Categorias (nombre,descripcion,status) VALUES ('$nombre','$descripcion','$estado')";
        $respuesta = mysqli_query($this->conn,$sql);
        if ($respuesta) {
            return true;
        } else {
            return false;
        }
    }

    function obtenerCategorias(){
        $sql = "SELECT * FROM Categorias";
        return  mysqli_query($this->conn,$sql);
    }

    function obtenerCategoria($id){
        $sql = "SELECT * FROM Categorias WHERE id=$id";
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    function modificarCategoria($data){
        $id = $data['id'];
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $estado = $data['estado'];

        $sql = "UPDATE Categorias SET nombre = '$nombre', descripcion = '$descripcion', estado = '$estado' WHERE id='$id'";
        $update = mysqli_query($this->conn,$sql);
        if ($update) {
            return true;
        }else{
            return false;
        }
    }

    function eliminarCategoria($id){
        $sql = "DELETE FROM Categorias WHERE id=$id";
        return mysqli_query($this->conn,$sql);
    }


}


?>