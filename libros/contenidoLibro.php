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
        <div class="nombreAutor">Autor: 
                <?php
                    $autor = new Autor();
                    $idAutor = $datosDelLibro->idAutor;      
                    $datosDelAutor = $autor->obtenerNombreAutor($idAutor);
                    echo $datosDelAutor->nombreAutor;
                ?>
        </div>

        <div class="publicacion">Año de Publicación:
            <?= $datosDelLibro->fechaPublicacion ?>
                
        </div>
        <div class="categoria">
            Categoría: 
                <?php
                    $idCategoria = $datosDelLibro->idCategoria;      
                    $datosDeLaCategoria = $libro->obtenerCategoria($idCategoria);
                    echo $datosDeLaCategoria->nombreCategoria;
                ?>
        </div>
        <div class="descripcion">
        <?= $datosDelLibro->descripcion ?>
        </div>
        <div class="valoracion">
            <?php
                echo "Valoración Total";
            ?>

        </div>

        <div class="valoracion"> <img src="../includes/imagenes/valoracion_cuatro.png" alt="Valoración"></div>
        <div class="precio">$ <?= $datosDelLibro->precio ?></div>



    </div>
</section>
