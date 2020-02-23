<?php
include_once('claseImagen.php');
$imagen = new Imagen();
$libro = new Libro();

$todasLasImagenes = $imagen->obtenerImagenesActivas($idLibro);

?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

        <?php
        $conteo = 0;
        if($todasLasImagenes->lengths===null){
            echo "<div class='carousel-item active' data-interval='1000'>";
            echo "<img src='$imagen->root/moduloImagenes/imagenesLibros/imagenNoEncontrada.png' alt='Imagen no encontrada' width='300px'/></div>";
        }
        else{
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
        }
        ?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
