<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Libreria_Vitual_Bictia/Conn/config.php');
include_once(PATH . '/Conn/Database.php');
class Libro
{
    public $idLibro;
    public $nombreLibro;
    public $descripcion;
    public $precio;
    public $idCategoria;
    public $idEditorial;
    public $conn;

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

    function obtenerlibros()
    {
        $sql = "SELECT * FROM libros";
        return mysqli_query($this->conn, $sql);
    }

    function obtenerLibro($idLibro)
    {
        $sql = "SELECT * FROM libros WHERE idLibro=$idLibro";
        //echo $sql;
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }
    function obtenerAutores($idAutor)
    {
        $sql = "SELECT * FROM autores WHERE idAutor=$idAutor";
        //echo $sql;
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    function modificarPersona($data)
    {
        $nombres = $data['nombres'];
        $apellidos = $data['apellidos'];
        $profesion = $data['profesion'];
        $descripcion = $data['descripcion'];
        $id = $data['id'];
        $sql = "UPDATE personas SET nombres='$nombres',apellidos='$apellidos',profesion='$profesion',descripcion='$descripcion' WHERE id=$id ";
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
