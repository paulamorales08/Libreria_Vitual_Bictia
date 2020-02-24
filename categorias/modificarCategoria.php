<?php
    include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
      include_once('../includes/links.php');
    ?>
    <title>Modificar Categoría</title>
</head>


<body>
<?php
      include_once('../includes/header.php');
    ?>

    <br>

    <?php
    include_once('Categorias.php');
    $categoria = new Categoria();
    $dp = $categoria->obtenerCategoria($_GET['idCategoria']);


    if (isset($_POST) && !empty($_POST)) {
        $modificar = $categoria->modificarCategoria($_POST);
        if ($modificar) {
            //header('location:principal.php');
        } else {
            echo "Error al modificar";
        }
}
?>

<div class="container w-25 p-3 shadow p-3 mb-5 bg-white rounded text-dark mt-5">
    <div class="container">
        <div class="form-group pt-3 pb-3">
            <h2 class=" text-center font-weight-light">Modificar Categoria</h2>
        </div>

        <form method="POST">
            <div class="form-group w-100">
                <label for="">Nombre Categoria</label>
                <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria" value="<?= $dp->nombreCategoria ?>">
            </div>

            <div class="form-group w-100">
                <label for="">Estado</label>
                <select class="form-control" id="estado" name="estado" value="<?= $dp->estado ?>">
                    <?php
                    if ($dp->estado == 1) {
                        echo "<option value='1'>Activo</option>";
                        echo "<option value='0'>Inactivo</option>";
                    } else {
                        echo "<option value='0'>*Inactivo</option>";
                        echo "<option value='1'>*Activo</option>";
                    } ?>
                </select>
            </div>
            <div class="form-group w-50">
                <label for="">Id Categoria</label>
                <input class="form-control w-25" name='idCategoria' id='idCategoria' type="text" placeholder="Ingresa la categoria" require readonly value="<?= $dp->idCategoria ?>">
            </div>
            <div class="form-group w-100">
                <label for="">Descripción</label>
                <textarea class="form-control " id="descripcion" name="descripcion" rows="3"><?= $dp->descripcion ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Modificar</button>
            <a class="btn btn-outline-secondary" href="principal.php" role="button">Regresar</a>
        </form>

    </div>

</div>

<?php
  include_once('../includes/footer.php');
?>

</body>
</html>