
<?php
    include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
      include_once('../includes/links.php');
    ?>
    <title>Modificar Libro</title>
</head>


<body>
    <?php
      include_once('../includes/header.php');
    ?>

<?php
    include_once('libros.php');
    $autor = new Autores();
    $dp = $autor->getAutor($_GET['id']);
    
    if ( isset($_POST) && !empty($_POST)) {
        $modificar = $autor->updateAutor($_POST);
        var_dump($modificar);
        if ($modificar) {
            echo "Modificación exitosa";
            //header('location:principalAutor.php');
        }else{
            echo "Error al modificar";
        }
    }
?>

<div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark mt-5">
    <div class="container">
        <div class="form-group pt-3 pb-3">
            <h2 class=" text-center font-weight-light">Modificar Autor</h2>
        </div>

        <form  method="POST" class="w-100 p-4">
        <div class="form-group">
            <label for="idAutor">idAutor</label>
            <input name='idAutor' id="idAutor" type="text" class="form-control" value="<?= $dp->idAutor ?>" readonly>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input name='autor' id="autor" type="text" require class="form-control" value="<?= $dp->nombreAutor ?>">
        </div>
        <br>
        <button class="btn btn-primary">Modificar Autor</button>
        <a href='principalAutor.php' class="btn btn-outline-secondary">Volver </a>
        <br><br>
    </form>

    </div></div>



<?php
  include_once('../includes/footer.php');
?>

</body>
</html>

</body>
</html>
