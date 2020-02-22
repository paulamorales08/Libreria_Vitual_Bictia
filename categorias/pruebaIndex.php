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
$nombreCat = $categoria->obtenerCategoria($consultaLibro);


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

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
                  var_dump($primeraImagenLibro);  
                  if($primeraImagenLibro==null){
                    echo "No hay imagen";   
                  }
                  else{
                      echo $primeraImagenLibro->$urlImagen;
                      
                   //echo "<img src='$imagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' alt='$primeraImagenLibro->nombreImagen'>";
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
                echo " </ul>
                        </div>";
                echo "</br>";
                echo "</div>";

                //$primeraImagenLibro= $imagen->obtenerPrimeraImagen($libroRecorrido->idLibro);
                //echo "<td> <img src='$imagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' class='d-block w-100' alt='$primeraImagenLibro->nombreImagen' width='300px'/></td>";
            }
            ?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>