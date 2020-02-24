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

        <?php
            include_once('../Comentarios/Comentarios.php');
            $comentario1 = new Comentario();
            $valores = $comentario1-> valoracionTodosComentarios($idLibro);  
            $valores->totalValoracion;
            $valoracionTotal = round($valores->totalValoracion);
            //echo $valoracionTotal;

            switch ($valoracionTotal) {
                case 0:
                    echo " <div class='valoracion'><img src='../includes/imagenes/valoracion_cero.png' alt='Valoración 0'></div>";
                    break;
                case 1:
                    echo " <div class='valoracion'><img src='../includes/imagenes/valoracion_uno.png' alt='Valoración 1'></div>";
                    break;
                case 2:
                    echo " <div class='valoracion'><img src='../includes/imagenes/valoracion_dos.png' alt='Valoración 2'></div>";
                    break;
                case 3:
                    echo " <div class='valoracion'><img src='../includes/imagenes/valoracion_tres.png' alt='Valoración 3'></div>";
                    break;
                case 4:
                    echo " <div class='valoracion'><img src='../includes/imagenes/valoracion_cuatro.png' alt='Valoración 4'></div>";
                    break;
                case 5:
                    echo " <div class='valoracion'><img src='../includes/imagenes/valoracion_cinco.png' alt='Valoración 5'></div>";
                    break;
            }
        ?>
        <div class="precio">$ <?= $datosDelLibro->precio ?></div>



    </div>
</section>
