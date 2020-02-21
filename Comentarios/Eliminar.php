<?php
if(isset($_GET['idComentario'])){
    require('Comentarios.php');
$comentario1=new Comentario();
$eliminar=$comentario1->eliminarComentario($_GET['idComentario']);
if($eliminar){
header('location:index.php');
}else{

 echo "error al eliminar";
}
}

?>