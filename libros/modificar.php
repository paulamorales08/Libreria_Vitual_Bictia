<?php
    include_once('libros.php');
    include_once('../categorias/Categorias.php');
    $libro = new Libros();
    $autor = new Autores();
    $editorial = new Editoriales();
    $categoria = new Categorias();
    $dp = $libro->getLibro($_GET['id']);
    
    if ( isset($_POST) && !empty($_POST)) {
        $modificar = $libro->updateLibro($_POST);
        var_dump($modificar);
        if ($modificar) {
            echo "Modificación exitosa";
            header('location:index.php');
        }else{
            echo "Error al modificar";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Libreria</title>
</head>
<body>

<h1>Modificación de Libro</h1>

<form  method="POST" class="w-100 p-4">
        <div class="form-group">
            <label for="lidibro">idLibro</label>
            <input name='idLibro' id="idLibro" type="text"
            require class="form-control" value="<?= $dp->idLibro ?>">
        </div>
        <div class="form-group">
            <label for="libro">Libro</label>
            <input name='libro' id="libro" type="text"  require class="form-control" value="<?= $dp->nombreLibro ?>">
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"> <?= $dp->descripcion ?> </textarea>
        </div>
        <div class="form-group">
            <label for="fechaPublicacion">Fecha de Publicacion</label>
            <input name='fechaPublicacion' id='fechaPublicacion' type="date" placeholder="Ingresar la fecha Publicacion" 
            require class="form-control" value="<?= $fechaCorta = $dp->fechaPublicacion?>">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input name='precio' id='precio' type="number" placeholder="Ingresar el precio" 
            require class="form-control" value="<?= $dp->precio ?>">
        </div>
        <?php
            $idAutr = $dp->idAutor;
            $datosAutor = $autor->getNombreAutor($idAutr);
        ?>
        <div class="form-group">
            <label for="idAutor">Autor</label>
            <select name="idAutor" id="idAutor" class="form-control">
                <option value="<?= $datosAutor->idAutor ?>">Actual - <?= $datosAutor->nombreAutor ?></option>
                <option value="">  -  </option>
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
        <?php
            $idEdit = $dp->idEditorial;
            $datosEditorial = $editorial->getNombreEditorial($idEdit);
        ?>
        <div class="form-group">
            <label for="idEditorial">Editorial</label>
            <select name="idEditorial" id="idEditorial" class="form-control">
                <option value="<?= $datosEditorial->idEditorial ?>">Actual - <?= $datosEditorial->nombreEditorial ?></option>
                <option value="">  -  </option>
                <?php
                    $todasLasEditoriales = $editorial->getAllEditoriales();
                    while ($per = mysqli_fetch_object($todasLasEditoriales)) {
                        echo "<option value='$per->idEditorial'>$per->nombreEditorial</option>";
                    }
                ?>
            </select>
        </div>
        <?php
            $idCatg = $dp->idCategoria;
            $datosCategoria = $categoria->getNombreCategoria($idCatg);
        ?>
        <div class="form-group">
            <label for="idCategoria">Categoria</label>
            <select name="idCategoria" id="idCategoria" class="form-control">
                <option value="<?= $datosCategoria->idCategoria ?>">Actual - <?= $datosCategoria->nombreCategoria ?></option>
                <option value="">  -  </option>
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
                <?php
                    if ($dp->estado === '0') {
                        echo "<option value='0'>No Disponible</option>";
                        echo "<option value='1'>Disponible</option>";
                    }else{
                        echo "<option value='1'>Disponible</option>";
                        echo "<option value='0'>No Disponible</option>";
                    }
                ?>
            </select>
        </div>
        <br>
        <button class="btn btn-primary">Modificar Libro</button>
        <br><br>
    </form>
</body>
</html>
