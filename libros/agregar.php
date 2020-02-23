<?php
    include('libros.php');
    $libro = new Libros();
    $categoria = new Categorias();
    $autor = new Autores();
    $editorial = new Editoriales();

    if ( isset($_POST) && !empty($_POST) ) {
        $insert = $libro->crearLibro($_POST);
        if ($insert) {
            echo "Registro exitoso";
        }else{
            echo "Fallo......";
        }
    }

    $todosLosLibros = $libro->getLibros();
    $todosLosAutores = $autor->getAllAutores();
    $todasLasCategorias = $categoria->getAllCategorias();
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

<h1>Agregar Nuevo Libro</h1>

<form  method="POST" class="w-100 p-4">
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
            <input name='fechaPublicacion' id='fechaPublicacion' type="date" placeholder="Ingresar la fecha Publicacion " require class="form-control">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input name='precio' id='precio' type="text" placeholder="Ingresar el precio" require class="form-control">
        </div>
        <div class="form-group">
            <label for="idAutor">Autor</label>
            <select name="idAutor" id="idAutor" class="form-control">
                <option value="-"> - </option>
                <?php
                    $todosLosAutores = $autor->getAllAutores();
                    while ($per = mysqli_fetch_object($todosLosAutores)) {
                        echo "<option value='$per->idAutor'>$per->nombreAutor</option>";
                    }
                ?>
            </select>
        </div>
        <div>
        </div>
        <div class="form-group">
            <label for="idEditorial">Editorial</label>
            <select name="idEditorial" id="idEditorial" class="form-control">
                <option value="-"> - </option>
                <?php
                    $todasLasEditoriales = $editorial->getAllEditoriales();
                    while ($per = mysqli_fetch_object($todasLasEditoriales)) {
                        echo "<option value='$per->idEditorial'>$per->nombreEditorial</option>";
                    }
                ?>
            </select>       
        </div>
        <div class="form-group">
            <label for="idCategoria">Categoria</label>
            <select name="idCategoria" id="idCategoria" class="form-control">
                <option value="-"> - </option>
                <?php
                    $todasLasCategorias = $categoria->getAllCategorias();
                    while ($per = mysqli_fetch_object($todasLasCategorias)) {
                        echo "<option value='$per->idCategoria'>$per->nombreCategoria</option>";
                    }
                ?>
            </select> 
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option value="-"> - </option>
                <option value="1">Disponible</option>
                <option value="0">No Disponible</option>
            </select>
        </div>
        <br>
        <button class="btn btn-primary">Registrar Libro</button>
        <br><br>

        <div>
            <table class="table">
                <thead class="thead-dark">
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de Publicación</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Imágenes</th>
                    <th scope="col">Eliminar</th>
                </thead>

                <?php
                    while ($lib = mysqli_fetch_object($todosLosLibros)) {
                        echo "<tr>";
                        echo "<td scope='row'>$lib->nombreLibro</td>";
                        echo "<td scope='row'>$lib->descripcion</td>";
                        echo "<td scope='row'>$lib->fechaPublicacion</td>";
                        echo "<td scope='row'>$lib->precio</td>";
                        echo "<td scope='row'>$lib->estado</td>";

                        $edit = $lib->idEditorial;
                        $datosEditorial = $editorial->getEditorial($edit);

                        echo "<td scope='row'>$datosEditorial->nombreEditorial</td>";

                        $aut = $lib->idAutor;
                        $datosAutor = $autor->getAutor($aut);

                        echo "<td scope='row'>$datosAutor->nombreAutor</td>";

                        $cat = $lib->idCategoria;
                        $datosCategoria = $categoria->getCategoria($cat);

                        echo "<td scope='row'>$datosCategoria->nombreCategoria</td>";

                        echo "<td scope='row'> <a href='modificar.php?id=$lib->idLibro' class='btn btn-outline-success'>Modificar</a> </td>";
                        echo "<td scope='row'> <a href='../moduloImagenes/index.php?idLibro=$lib->idLibro' class='btn btn-outline-success'>Imágenes</a> </td>";
                        echo "<td scope='row'> <a href='eliminar.php?id=$lib->idLibro' class='btn btn-outline-success'>Eliminar</a> </td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </form>
</body>
</html>