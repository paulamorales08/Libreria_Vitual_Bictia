<br>
<section class="contenedor">
    <div class="imagenLibro">
        <?php

            include_once('../moduloImagenes/listadoImagenesLibro.php');
            include_once('../moduloImagenes/claseImagen.php');
            $libro = new Libro();
            $idLibro = $_GET['idLibro'];

            $datosDelLibro = $libro->obtenerLibro($idLibro);

        ?>
    </div>
    <div class="datosLibro">
        <div class="nombreLibro">
        <h1>
            <?= $datosDelLibro->nombreLibro ?>
        </h1>
        </div>
        <div class="nombreAutor">Autor: <?= $datosDelLibro->idAutor ?></div>
        <div class="publicacion">Año de Publicación <?= $datosDelLibro->fechaPublicacion ?> - Categoría: <?= $datosDelLibro->idCategoria ?></div>
        <div class="descripcion">
        <?= $datosDelLibro->descripcion ?>
        </div>

        <div class="valoracion"> <img src="../includes/imagenes/valoracion_cuatro.png" alt="Valoración"></div>
        <div class="precio">$ <?= $datosDelLibro->precio ?></div>



    </div>
</section>
