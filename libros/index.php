<?php
    include('libros.php');
    $libro = new Libros();

    if ( isset($_POST) && !empty($_POST) ) {
        $insert = $libro->crearLibro($_POST);
        if ($insert) {
            echo "Registro exitoso";
        }else{
            echo "Fallo.....";
            var_dump($insert);  
        }
    }

    $ultimoLibro = $libro->getLastLibro();
    var_dump($ultimoLibro);
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
            <label for="fechaPublicacion">Fecha de Publicacion</label>
            <input name='fechaPublicacion' id='fechaPublicacion' type="text" placeholder="Ingresar la fecha Publicacion " require class="form-control">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input name='precio' id='precio' type="text" placeholder="Ingresar el precio" require class="form-control">
        </div>
        <div class="form-group">
            <label for="idAutor">idAutor</label>
            <input name='idAutor' id='idAutor' type="number" placeholder="Ingresar el idAutor" require class="form-control">
        </div>
        <div class="form-group">
            <label for="idEditorial">idEditorial</label>
            <input name='idEditorial' id='idEditorial' type="number" placeholder="Ingresar el idEditorial" require class="form-control">
        </div>
        <div class="form-group">
            <label for="idCategoria">idCategoria</label>
            <input name='idCategoria' id='idCategoria' type="number" placeholder="Ingresar el idCategoria" require class="form-control">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="1">1</option>
                <option value="0">0</option>
            </select>
        </div>

        <button class="btn btn-primary">Registrar Libro</button>
    </form>


    <table>
        <th>
            Nombre
        </th>
        <th>
            ID
        </th>

    <tr>
        <tr><?= $ultimoLibro->nombreLibro ?></tr>
        <tr><?= $ultimoLibro->idLibro ?></tr>
    </tr>

    </table>
</body>
</html>