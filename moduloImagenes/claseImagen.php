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
    function incluirImagen($data)
    {
        $nombreImagen = $data['nombreImagen'];
        $orden = $data['orden'];
        $idLibro = $data['idLibro'];
        $urlImagen = $data['urlImagen'];
        $sql = "INSERT INTO imagenes (nombreImagen, orden, idLibro, urlImagen, estado) VALUES ('$nombreImagen','$orden', '$idLibro', '$urlImagen', 1)";
        $res = mysqli_query($this->conn, $sql);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    function obtenerImagenes($idLibro)
    //Esta función es usada por el administrador
    {
        $sql = "SELECT * FROM imagenes WHERE idLibro=$idLibro ORDER BY estado DESC, orden ASC";
        return mysqli_query($this->conn, $sql);
        //return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    function obtenerPrimeraImagen($idLibro)
    {
        $sql = "SELECT * FROM imagenes WHERE idLibro=$idLibro AND estado =1 ORDER BY estado DESC, orden ASC LIMIT 1";
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    function obtenerImagenesRecientes()
    //Esta función es usada por el administrador y devuelve las 5 imágenes recientes
    {
        $sql = "SELECT * FROM imagenes ORDER BY idImagen DESC LIMIT 5";
        return mysqli_query($this->conn, $sql);
        //return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    //Función que devuelve las imágenes activas
    function obtenerImagenesActivas($idLibro)
    {
        $sql = "SELECT * FROM imagenes WHERE idLibro=$idLibro AND estado=1 ORDER BY orden";
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
    function eliminarImagen($id)
    {
        //$sql = "UPDATE imagenes SET estado=0, orden=100 WHERE idImagen=$id ";
        $sql = "DELETE FROM imagenes WHERE idImagen=$id ";
        $eliminar = mysqli_query($this->conn, $sql);

        if ($eliminar) {
            return true;
        } else {
            return false;
        }
    }
}
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
    function obtenerLibrosRecientes()
    //Esta función es usada por el administrador y devuelve los 5 libros recientes
    {
        $sql = "SELECT * FROM libros ORDER BY idLibro DESC LIMIT 10";
        return mysqli_query($this->conn, $sql);
        //return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }
    function obtenerCategoria($idCategoria)
    {
        $sql = "SELECT * FROM categorias WHERE idCategoria=$idCategoria";
        //return mysqli_query($this->conn, $sql);
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }
}
class Autor
{
    public $idAutor;
    public $nombreAutor;
    public $conn;

    function __construct()
    {
        $db = new Databse();
        $this->conn =  $db->__construct();
    }

    function obtenerNombreAutor($idAutor)
    {
        $sql = "SELECT * FROM autores WHERE idAutor=$idAutor";
        //return mysqli_query($this->conn, $sql);
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }
}
