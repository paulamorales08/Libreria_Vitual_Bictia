<?php
    include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
      include_once('../includes/links.php');
    ?>
    <title>Administrador de Editoriales</title>
</head>


<body>
    <?php
      include_once('../includes/header.php');
    ?>


<?php
    include('libros.php');
    $editorial = new Editoriales();

    if ( isset($_POST) && !empty($_POST) ) {
        $insert = $editorial->crearEditorial($_POST);
        if ($insert) {
            echo "Registro exitoso";
        }else{
            echo "Fallo......";
        }
    }

    $todasLasEditoriales= $editorial->getAllEditoriales();
?>

<br>
<div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark mt-5">
    <div class="container">
        <div class="form-group pt-3 pb-3">
            <h2 class=" text-center font-weight-light">Agregar Editorial</h2>
        </div>
<form  method="POST" class="w-100 p-4">
        <div class="form-group">
            <label for="editorial">Nombre Editorial</label>
            <input name='editorial' id="editorial" type="text" placeholder="Ingresa la Editorial" require class="form-control">
        </div>
        <br>
        <button class="btn btn-success">Registrar Editorial</button>
        <a class="btn btn-outline-secondary" href="../libros" role="button">Regresar</a>
        <br><br>

        <div>
            <table class="table">
                <thead class="thead-dark">
                    <th scope="col">Nombre Editorial</th>
                    <th scope="col">Modificar</th>
                </thead>

                <?php
                    while ($edit = mysqli_fetch_object($todasLasEditoriales)) {
                        echo "<tr>";
                        echo "<td scope='row'>$edit->nombreEditorial</td>";

                        echo "<td scope='row'> <a href='modificarEditorial.php?id=$edit->idEditorial' class='btn btn-outline-success'>Modificar</a> </td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </form>
    </div></div>

<?php
  include_once('../includes/footer.php');
?>

</body>
</html>