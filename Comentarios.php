<?php 
include('Database.php');
class Comentario{
public $idComentario;
public $fechaComentario;
public $comentario;
public $valoracion;
public $estado;
public $idLibro;
public $idUsuario;

function __construct()
{
    $db=new Database();
    $this->conn = $db->conectarse();
    
}


function crearComentario($data){
$fechaComentario=$data['fechaComentario'];
$comentario=$data['comentario'];
$valoracion=$data['valoracion'];
$estado=$data['estado'];
$idLibro=$data['idLibro'];
$idUsuario=$data['idUsuario'];
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
function obtenerComentarios(){
    $sql="SELECT * FROM comentarios";
    return mysqli_query($this->conn,$sql);
}

/*function obtenerComentario($idComentario){
    $sql="SELECT * FROM comentarios WHERE id=$idComentario";
    return mysqli_fetch_object(mysqli_query($this->conn,$sql));
}
*/

}

?>