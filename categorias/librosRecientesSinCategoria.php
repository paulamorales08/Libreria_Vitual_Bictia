<div class="container text-center p-4 shadow p-3 mb-5 bg-white rounded">

<?php
    echo " <h3 class='font-weight-light pb-2'><span class='badge badge-dark'>Libros más recientes</span></h3>";
?>

<div class="d-flex flex-row bd-highlight mb-3 d-flex justify-content-center d-flex flex-wrap">
    <?php

    while ($libroRecorrido = mysqli_fetch_object($todosLibrosSinCategoria)) {

        echo "<div class='p-2 bd-highlight'>";
        echo "<div class='card text-center shadow-sm p-3 mb-5 bg-white rounded' style='width: 18rem;'>";

        $idLibro = $libroRecorrido->idLibro;
       
        $primeraImagenLibro = $imagen->obtenerPrimeraImagen($idLibro);
           
          if($primeraImagenLibro==null){
            echo "No hay imagen";   
          }
          else{    
              echo "<img src='$imagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' class='card-img-top' alt='$primeraImagenLibro->nombreImagen'/>";
          }

        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>$libroRecorrido->nombreLibro</h5>";
        echo "<p class='card-text text-justify'>$libroRecorrido->descripcion</p>";
        echo "</div>";
        echo "<ul class='list-group list-group-flush'>";
        echo "<li class='list-group-item'>$libroRecorrido->fechaPublicacion</li>";
        echo "<li class='list-group-item'>Precio: $$libroRecorrido->precio</li>";
        echo "<li class='list-group-item'>Estado: $libroRecorrido->estado</li>";
        echo "<li class='list-group-item'>idAutor: $libroRecorrido->idAutor</li>";
        echo "<li class='list-group-item'>idEditorial: $libroRecorrido->idEditorial</li>";
        
        //Publica el boton de modificar si el rol del usuario logueado es ADMIN.
        if (isset($_SESSION['rol']) && !empty($_SESSION['rol'])) {
            if ($_SESSION['rol'] == 0) {
                echo "<td class='align-middle'><a href='modificarCat.php?idCategoria=$libroRecorrido->idLibro' class='btn btn-outline-success'>Modificar</a></td> ";
            }
        }
        echo " </ul>
                </div>";
        echo "</br>";
        echo "</div>";
    }
    ?>
    </div>
    </div>