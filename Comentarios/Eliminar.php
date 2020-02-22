<?php
if(isset($_GET['idComentario'])){
    $idLibro = $_GET['idLibro']; //Obtenemos el idLibro del URL;
    include_once('Comentarios.php');
    $comentario1=new Comentario();
    $eliminar=$comentario1->eliminarComentario($_GET['idComentario']);

if($eliminar){
    header("location:../libros/detalleLibro.php?idLibro=$idLibro");
    //header("location:todosLosComentarios.php?idLibro=$idLibro");
}else{
    echo "<div class='content'><div class='alert alert-warning' role='alert'>Error al eliminar.</div></div>";
}
}
?>