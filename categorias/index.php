<?php
include('Categorias.php');

$categoria = new Categoria();

if (isset($_POST) && !empty($_POST)) {
    $insert = $categoria->crearCategorias($_POST); // ENVIAMOS LOS PARAMETROS DE POST A LA FUNCION DE CREARPERSONA()
    if ($insert) {
        echo "Registro exitoso";
    } else {
        echo "Fallo...";
    }
}
$todasCategorias = $categoria->obtenerCategorias();

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

        <form method="POST">
            <div class="form-group">
                <label for="">Nombre Categoria</label>
                <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria">
            </div>

            <div class="form-group">
                <label for="">Estado</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
        

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">MODIFICAR</th>
                </tr>
            </thead>
       
        <?php
        while ($cate = mysqli_fetch_object($todasCategorias)) {

            echo "<tbody>";
            echo "<tr>";    
            echo "<td> $cate->nombreCategoria </td>";
            echo "<td> $cate->estado </td>";
            echo "<td> $cate->descripcion </td>";
            echo "<td><a href='modificarCat.php?idCategoria=$cate->idCategoria' class='btn btn-primary'>Modificar</a></td> ";
            echo "</tbody>";
        }
        ?>
         </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>