<?php
include_once('Categorias.php');
include_once('../moduloImagenes/claseImagen.php');
$imagen = new Imagen();
$categoria = new Categoria();

if (isset($_GET) && !empty($_GET)) {
    $consultaLibro = $_GET['idCategoria'];
    $todosLibros = $categoria->filtroLibrosCategoria($consultaLibro);
   
} else {
    echo "No se encontro";
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<h1>Prueba</h1>

<?php

    while ($libroRecorrido = mysqli_fetch_object($todosLibros)) {
        echo $libroRecorrido->nombreLibro;
        echo $libroRecorrido->descripcion;
        echo $libroRecorrido->idLibro;
       // $primeraImagenLibro= $imagen->obtenerPrimeraImagen($libroRecorrido->idLibro);
       // echo "<td> <img src='$imagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' class='d-block w-100' alt='$primeraImagenLibro->nombreImagen' width='300px'/></td>";
    }

?>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>