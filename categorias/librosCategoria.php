<?php
    include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
      include_once('../includes/links.php');
    ?>
    <title>Detalle de Libro</title>
</head>


<body>
    <?php
      include_once('../includes/header.php');
    ?>


    <?php
    include_once('../includes/header.php');
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
    $nombreCat = $categoria->obtenerCategoria($consultaLibro);
    ?>

<div class="container text-center p-4 shadow p-3 mb-5 bg-white rounded">

    <?php
        echo " <h3 class='font-weight-light pb-2'>Sección: <span class='badge badge-dark'>$nombreCat->nombreCategoria</span></h3>";
    ?>

<div class="d-flex flex-row bd-highlight mb-3 d-flex justify-content-center d-flex flex-wrap">
    <?php

    while ($libroRecorrido = mysqli_fetch_object($todosLibros)) {

        echo "<div class='p-2 bd-highlight'>";
        echo "<div class='card text-center shadow-sm p-3 mb-5 bg-white rounded' style='width: 18rem;'>";

        $idLibro = $libroRecorrido->idLibro;
       
        $primeraImagenLibro = $imagen->obtenerPrimeraImagen($idLibro);
           
          if($primeraImagenLibro==null){
            echo "No hay imagen";   
            //var_dump($primeraImagenLibro);
            //var_dump($idLibro);
          }
          else{
             // echo $primeraImagenLibro->$urlImagen;
              echo "<img src='$imagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' class='card-img-top' alt='$primeraImagenLibro->nombreImagen'/>";
           //echo "<img src='$todaImagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' alt='$primeraImagenLibro->nombreImagen'>";
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
            echo "No se ha logeado";
        } else {
            if ($_SESSION['rol'] == 0) {
                echo "<td class='align-middle'><a href='modificarCat.php?idCategoria=$libroRecorrido->idLibro' class='btn btn-outline-success'>Modificar</a></td> ";
            }
        }

        


        echo " </ul>
                </div>";
        echo "</br>";
        echo "</div>";

        //$primeraImagenLibro= $todaImagen->obtenerPrimeraImagen($libroRecorrido->idLibro);
        //echo "<td> <img src='$todaImagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' class='d-block w-100' alt='$primeraImagenLibro->nombreImagen' width='300px'/></td>";
    }
    ?>
</div>
</div>



<?php
  include_once('../includes/footer.php');
?>

</body>
</html>