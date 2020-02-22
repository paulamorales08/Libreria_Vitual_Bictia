<?php
include('Categorias.php');

$categoria = new Categoria();

if (isset($_POST) && !empty($_POST)) {
    $insert = $categoria->crearCategorias($_POST); // ENVIAMOS LOS PARAMETROS DE POST A LA FUNCION DE CREARPERSONA()
    if ($insert) {
        echo '<div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registro exitoso!!</strong> Tú categoria se ha agregado.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else {
        echo '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!!</strong> Tú categoria no se ha podido abregar.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
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
    <div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark">
        <div class="form-group pt-4">
            <h2 class="text-center font-weight-light">Administrador Categorias</h2>
        </div>
        <form method="POST" class="m-3">
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
            <div class="d-flex flex-row-reverse bd-highlight">
                <button type="submit" class="btn btn-success m-1 pl-4 pr-4">Agregar</button>
            </div>

        </form>

        <div class="container">
            <table class="table mt-4">
                <thead class="thead-dark text-center">
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
                    echo "<tr class='text-center'>";
                    echo "<td> $cate->nombreCategoria </td>";
                    if ($cate->estado == 1) {
                        echo "<td> Activo </td>";
                    } else {
                        echo "<td> Inactivo </td>";
                    }
                    echo "<td  class='text-justify text-center '> $cate->descripcion </td>";
                    echo "<td class='align-middle'><a href='modificarCat.php?idCategoria=$cate->idCategoria' class='btn btn-outline-success'>Modificar</a></td> ";
                    echo "</tbody>";
                }
                ?>
            </table>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>