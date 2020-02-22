<?php
    if (isset($_GET['id'])) {
        require('libros.php');
        $lib = new Libros();
        $eliminar = $lib->deleteLibro($_GET['id']);
        if ($eliminar) {
            header('location: index.php');
        }else{
            echo "Error al eliminar";
        }
    }
?>