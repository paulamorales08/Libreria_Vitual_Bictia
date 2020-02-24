<?php
include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/estilos.css?ver19">
  <link rel="stylesheet" href="includes/fontawesome/css/all.css">
  <link rel="shortcut icon" href="includes/favicon/favicon.ico" />
  <title>Resultados</title>
</head>


<body>
  <?php
  include_once('../includes/header.php');
  ?>


<div class="container text-center p-4 shadow p-3 mb-5 bg-white rounded">

<?php
    include_once('../categorias/Categorias.php');
    include_once('../moduloImagenes/claseImagen.php');
    include_once('../libros/libros.php');
    $imagen = new Imagen();
    $categoria = new Categoria();
    $busqueda = new Libros();
    $resultadoBusqueda = $busqueda->buscarLibro($_GET['texto']);  
    $rows = $resultadoBusqueda->num_rows;
    if ($rows>0) {
        echo " <h3 class='font-weight-light pb-2'><span class='badge badge-dark'>Resultados encontrados $rows </span></h3>";
    }else{
        echo " <h3 class='font-weight-light pb-2'><span class='badge badge-dark'>No se han encontrado resultados</span></h3>";
    }
   
?>

<div class="d-flex flex-row bd-highlight mb-3 d-flex justify-content-center d-flex flex-wrap">
    <?php

    while ($resultadoRecorrido = mysqli_fetch_object($resultadoBusqueda)) {

        echo "<div class='p-2 bd-highlight'>";
        echo "<div class='card text-center shadow-sm p-3 mb-5 bg-white rounded' style='width: 18rem;'>";

        $idLibro = $resultadoRecorrido->idLibro;
       
        $primeraImagenLibro = $imagen->obtenerPrimeraImagen($idLibro);
           
          if($primeraImagenLibro==null){
            echo "<img src='$imagen->root/moduloImagenes/imagenesLibros/imagenNoEncontrada.png' class='card-img-top' alt='Sin Imagnees'/>";  
          }
          else{    
              echo "<a href='../libros/detalleLibro.php?idLibro=$idLibro'><img src='$imagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' class='card-img-top' alt='$primeraImagenLibro->nombreImagen'/></a>";
          }

        echo "<div class='card-body'>";
        //echo "<h5 class='card-title'>$resultadoRecorrido->nombreLibro</h5>";
        echo "<a href='../libros/detalleLibro.php?idLibro=$idLibro' style='text-decoration:none;color:black'><h5 class='card-title'>$resultadoRecorrido->nombreLibro</h5></a>";
        echo "<div class='descripcion_libro'><p class='card-text text-justify'>$resultadoRecorrido->descripcion</p></div>";
        echo "</div>";
        echo "<ul class='list-group list-group-flush'>";
        //echo "<li class='list-group-item'>$resultadoRecorrido->fechaPublicacion</li>";
        $fechaPublicacion = $resultadoRecorrido->fechaPublicacion;
        $date = new DateTime($resultadoRecorrido->fechaPublicacion);
        echo "<div class='fechaPublicacion'>Año Publicación: ".$date->format('Y')."</div>"; 
        echo "<div class='precioLibro'><li class='list-group-item'>$$resultadoRecorrido->precio</li></div>";
        //echo "<li class='list-group-item'>Precio: $$resultadoRecorrido->precio</li>";
        //echo "<li class='list-group-item'>Estado: $libroRecorrido->estado</li>";
        //echo "<li class='list-group-item'>idAutor: $libroRecorrido->idAutor</li>";
        //echo "<li class='list-group-item'>idEditorial: $libroRecorrido->idEditorial</li>";
        
        //Publica el boton de modificar si el rol del usuario logueado es ADMIN.
        if (isset($_SESSION['rol'])){
            if($_SESSION['rol']==0){
                echo "<td class='align-middle'><a href='libros/modificarLibro.php?id=$resultadoRecorrido->idLibro' class='btn btn-outline-success'>Modificar</a></td> ";
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
  include_once('../includes/footer.php');
  ?>

</body>

</html>