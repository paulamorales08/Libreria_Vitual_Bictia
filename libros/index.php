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
<form  method="POST" class="w-75 p-3">
        <div class="form-group">
            <label for="libro">Libro</label>
            <input name='libro' id="libro" type="text" placeholder="Ingresa el Libro" require class="form-control">
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input name='autor' id='autor' placeholder="Ingresa el autor" require class="form-control">
        </div>
        <div class="form-group">
            <label for="fechaPublicacion">Fecha de Publicacion</label>
            <input name='fechaPublicacion' id='fechaPublicacion' type="date" placeholder="Ingresar la fecha Publicacion " require class="form-control">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input name='precio' id='precio' type="text" placeholder="Ingresar el precio" require class="form-control">
        </div>

        <button class="btn btn-primary">Enviar</button>
        <br/>
        <br>
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <th scope="col">Libro</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Fecha de Publicacion</th>
                    <th scope="col">Precio</th>
                </thead>

                <?php
                    while ($pers = mysqli_fetch_object($todasLasPersonas)) {
                        echo "<tr>";
                        echo "<td scope='row'>$pers->nombres</td>";
                        echo "<td scope='row'>$pers->apellidos</td>";
                        echo "<td scope='row'>$pers->profesion</td>";
                        echo "<td scope='row'>$pers->descripcion</td>";
                        echo "<td scope='row'> <a href='modificar.php?id=$pers->id'>Modificar</a> </td>";
                        echo "<td scope='row'> <a href='eliminar.php?id=$pers->id'>Eliminar</a> </td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </form>
</body>
</html>