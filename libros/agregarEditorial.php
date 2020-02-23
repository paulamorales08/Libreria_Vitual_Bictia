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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Libreria</title>
</head>
<body>

<h1>Agregar Nuevo Editorial</h1>

<form  method="POST" class="w-100 p-4">
        <div class="form-group">
            <label for="editorial">Nombre Editorial</label>
            <input name='editorial' id="editorial" type="text" placeholder="Ingresa la Editorial" require class="form-control">
        </div>
        <br>
        <button class="btn btn-primary">Registrar Editorial</button>
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

                        echo "<td scope='row'> <a href='modificarEditorial.php?id=$edit->idEditorial' >Modificar</a> </td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </form>
</body>
</html>