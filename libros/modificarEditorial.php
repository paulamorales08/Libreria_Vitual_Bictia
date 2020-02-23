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
    include_once('libros.php');
    $editorial = new Editoriales();
    $dp = $editorial->getEditorial($_GET['id']);
    
    if ( isset($_POST) && !empty($_POST)) {
        $modificar = $editorial->updateEditorial($_POST);
        var_dump($modificar);
        if ($modificar) {
            echo "Modificación exitosa";
            header('location:principalEditorial.php');
        }else{
            echo "Error al modificar";
        }
    }
?>


<br>
<div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark mt-5">
    <div class="container">
        <div class="form-group pt-3 pb-3">
            <h2 class=" text-center font-weight-light">Modificar Editorial</h2>
        </div>
        <form  method="POST" class="w-100 p-4">
        <div class="form-group">
            <label for="idEditorial">idEditorial</label>
            <input name='idEditorial' id="idEditorial" type="text" class="form-control" value="<?= $dp->idEditorial ?>" readonly>
        </div>
        <div class="form-group">
            <label for="editorial">Autor</label>
            <input name='editorial' id="editorial" type="text" require class="form-control" value="<?= $dp->nombreEditorial ?>">
        </div>
        <br>
        <button class="btn btn-primary">Modificar Editorial</button>
        <br><br>
    </form>


    </div></div>

<?php
  include_once('../includes/footer.php');
?>

</body>
</html>