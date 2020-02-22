<?php
include('Categorias.php');

$categoria = new Categoria();
$categorias = $categoria->obtenerCategorias();

if (isset($_GET) && !empty($_GET)) {
    $consulta = $_GET['consulta'];
    $todasCategorias = $categoria->filtroCategorias($consulta);

    while ($catRecorrido = mysqli_fetch_object($todasCategorias)) {
        echo $catRecorrido->nombreCategoria;
        echo $catRecorrido->idCategoria;
        echo $catRecorrido->descripcion;
        echo "</br> </br>";
        $todosLibros = $categoria->filtroLibrosCategoria($catRecorrido);
        while ($libroRecorrido = mysqli_fetch_object($todosLibros)) {
            echo $libroRecorrido->nombreLibro;
        }
    }
} else {
    echo "No se encontro";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container w-75 p-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clasificacion
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    while ($recorridoTodasCat = mysqli_fetch_object($categorias)) {
                        echo "<a class='dropdown-item' href='?idCategoria=$recorridoTodasCat->idCategoria'>$recorridoTodasCat->nombreCategoria</a>";
                    }
                    ?>
                </div>
            </li>


    </div>
    </nav>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>