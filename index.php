<?php
include_once('./Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/estilos.css?ver19">
  <link rel="stylesheet" href="includes/fontawesome/css/all.css">
  <link rel="shortcut icon" href="includes/favicon/favicon.ico" />
  <title>Librería Bictia</title>
</head>


<body>
  <?php
  include_once('./includes/header.php');
  ?>



<div class="container text-center p-4 shadow p-3 mb-5 bg-white rounded">

<?php
    include_once('categorias/Categorias.php');
    include_once('moduloImagenes/claseImagen.php');
    $imagen = new Imagen();
    $categoria = new Categoria();
    $todosLibrosSinCategoria = $categoria->librosRecientesActivos();
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
              echo "<a href='libros/detalleLibro.php?idLibro=$idLibro'><img src='$imagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' class='card-img-top' alt='$primeraImagenLibro->nombreImagen'/></a>";
          }

        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>$libroRecorrido->nombreLibro</h5>";
        echo "<div class='descripcion_libro'><p class='card-text text-justify'>$libroRecorrido->descripcion</p></div>";
        echo "</div>";
        echo "<ul class='list-group list-group-flush'>";
        //echo "<li class='list-group-item'>$libroRecorrido->fechaPublicacion</li>";
          $fechaPublicacion = $libroRecorrido->fechaPublicacion;
          $date = new DateTime($libroRecorrido->fechaPublicacion);
          echo "<div class='fechaPublicacion'>Publicación: ".$date->format('Y')."</div>";
          //echo "<li class='list-group-item'>$libroRecorrido->fechaPublicacion</li>";
        echo "<div class='precioLibro'><li class='list-group-item'>$$libroRecorrido->precio</li></div>";
        //echo "<li class='list-group-item'>Estado: $libroRecorrido->estado</li>";
        //echo "<li class='list-group-item'>idAutor: $libroRecorrido->idAutor</li>";
        //echo "<li class='list-group-item'>idEditorial: $libroRecorrido->idEditorial</li>";
        
        //Publica el boton de modificar si el rol del usuario logueado es ADMIN.
        if (isset($_SESSION['rol'])){
            if($_SESSION['rol']==0){
                echo "<td class='align-middle'><a href='libros/modificarLibro.php?id=$libroRecorrido->idLibro' class='btn btn-outline-success'>Modificar</a></td> ";
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

  <?php
  include_once('./includes/footer.php');
  ?>

</body>

</html>