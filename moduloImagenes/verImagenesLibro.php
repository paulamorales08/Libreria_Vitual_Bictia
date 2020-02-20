<?php
include('claseImagen.php');
$imagen = new Imagen();
$libro = new Libro();

$todasLasImagenes = $imagen->obtenerImagenesActivas($idLibro);
?>

<style>
    #imagenesDelLibro {
        max-width: 300px;
        border: 1px solid lightgray;
        border-radius: 3px;
        margin: 5px;
        padding: 5px;
    }
</style>

<div id="imagenesDelLibro" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

        <?php
        $conteo = 0;
        while ($imagenLibro = mysqli_fetch_object($todasLasImagenes)) {
            if ($conteo == 0) {
                echo "<div class='carousel-item active' data-interval='1000'>";
                echo "<img src='$imagen->root/moduloImagenes/imagenesLibros/$imagenLibro->urlImagen' class='d-block w-100' alt='$imagenLibro->nombreImagen' width='300px'/></div>";
            } else {
                echo "<div class='carousel-item' data-interval='1000'>";
                echo "<img src='$imagen->root/moduloImagenes/imagenesLibros/$imagenLibro->urlImagen' class='d-block w-100' alt='$imagenLibro->nombreImagen' width='300px'/></div>";
            }
            $conteo++;
        }
        ?>

    </div>
</div>