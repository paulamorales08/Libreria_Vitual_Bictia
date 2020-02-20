<?php
//include('Database.php'); //Esta lineas que siguen son la conecion a nuestro proyecto:
include($_SERVER['DOCUMENT_ROOT'] . '/Libreria_Vitual_Bictia/Conn/config.php');
include_once(PATH . '/Conn/Database.php');


class Comentario
{
    public $idComentario;
    public $fechaComentario;
    public $comentario;
    public $valoracion;
    public $estado;
    public $idLibro;
    public $idUsuario;

    function __construct()
    {
        $db = new Databse();
        $this->conn =  $db->__construct(); //Acá cambié el valor...
    }


    function crearComentario($data)
    {
        echo "Entró en Crear...";
        $fechaComentario = $data['fechaComentario'];
        $comentario = $data['comentario'];
        $valoracion = $data['valoracion'];
        $estado = $data['estado'];
        $idLibro = $data['idLibro'];
        $idUsuario = $data['idUsuario'];
        $sql = "INSERT INTO comentarios(fechaComentario,comentario,valoracion,estado,idLibro,idUsuario)
                VALUES('$fechaComentario','$comentario','$valoracion','$estado','$idLibro','$idUsuario')";
        $respuesta = mysqli_query($this->conn, $sql);
        echo $respuesta;
        if ($respuesta) {
            return true;
        } else {
            return false;
        }
    }
    function obtenerComentarios()
    {
        $sql = "SELECT * FROM comentarios";
        return mysqli_query($this->conn, $sql);
    }

    function obtenerComentario($idComentario)
    {
        $sql = "SELECT * FROM comentarios WHERE idComentario=$idComentario";
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }
    function modificarComentario($data){
        $idComentario = $data['idComentario'];
        $fechaComentario = $data['fechaComentario'];
        $comentario = $data['comentario'];
        $valoracion = $data['valoracion'];
        $estado = $data['estado'];
        $idLibro = $data['idLibro'];
        $idUsuario = $data['idUsuario'];
        $sql = "UPDATE comentarios SET 
    fechaComentario='$fechaComentario',comentario='$comentario',
    valoracion='$valoracion',estado='$estado',idLibro='$idLibro',
    idUsuario='$idUsuario' WHERE idComentario='$idComentario'";
        $update = mysqli_query($this->conn, $sql);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    function eliminarComentario($idComentario){
        $sql="DELETE FROM comentarios WHERE idComentario=$idComentario";
        return mysqli_query($this->conn,$sql);
    }
    function verTodos($idLibro){
        $sql = "SELECT * FROM comentarios WHERE idLibro= $idLibro";
        return mysqli_query($this->conn, $sql);
    }
}
