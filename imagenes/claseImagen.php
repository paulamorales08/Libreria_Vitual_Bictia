<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Libreria_Vitual_Bictia/Conn/config.php');
include_once(PATH . '/Conn/Database.php');
class Imagen
{

    public $idLibro;
    public $idImagen;
    public $nombreImagen;
    public $urlImagen;
    public $estado;
    public $conn;
    public $root = ROOT;
    public $path = PATH;

    function __construct()
    {
        $db = new Databse();
        $this->conn =  $db->__construct();
    }

    /** Función para insertar una nueva persona.*/
    function crearPersona($data)
    {
        $nombres = $data['nombres'];
        $apellidos = $data['apellidos'];
        $profesion = $data['profesion'];
        $descripcion = $data['descripcion'];
        $sql = "INSERT INTO personas (nombres, apellidos, profesion, descripcion) VALUES ('$nombres','$apellidos','$profesion','$descripcion')";
        $res = mysqli_query($this->conn, $sql);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    function obtenerImagenes($idLibro)
    {
        $sql = "SELECT * FROM imagenes WHERE idLibro=$idLibro";
        return mysqli_query($this->conn, $sql);
        //return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    function obtenerImagen($id)
    {
        $sql = "SELECT * FROM imagenes WHERE idImagen=$id";
        //echo $sql;
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }
    function modificarImagen($data)
    {
        $nombreImagen = $data['nombreImagen'];
        $idImagen = $data['idImagen'];
        $orden = $data['orden'];
        $estado = $data['estado'];
        $sql = "UPDATE imagenes SET nombreImagen='$nombreImagen', orden='$orden', estado='$estado' WHERE idImagen=$idImagen ";
        $update = mysqli_query($this->conn, $sql);

        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    function eliminarPersona($id)
    {
        $sql = "DELETE FROM personas WHERE id=$id ";
        $delete = mysqli_query($this->conn, $sql);

        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
}
