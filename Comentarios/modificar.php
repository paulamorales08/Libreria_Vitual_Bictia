
<?php
    include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
      include_once('../includes/links.php');
    ?>
    <title>Modificar Comentario</title>
</head>


<body>
    <?php
      include_once('../includes/header.php');
    ?>


<?php
    include('Comentarios.php');
    $comentario1 = new Comentario();
    $dc = $comentario1->obtenerComentario($_GET['idComentario']);
    if (isset($_POST) && !empty($_POST)) {
        $modificar = $comentario1->modificarComentario($_POST);
        if ($modificar) {
            $idLibro=$dc->idLibro;
            header("location:../libros/detalleLibro.php?idLibro=$idLibro");
        } else {
            echo "Fallo";
        }
    }
?>
<br>

<div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark">
        <div class="form-group pt-4">
            <h2 class="text-center font-weight-light">Modificar Comentario</h2>
        </div>

    <form method="POST" class="m3">
    <div class="form-group">
        <div class="form_group">
        <label for="comentario">Comentario</label>
        <textarea name="comentario" class="form-control" id="comentario" ><?= $dc->comentario ?></textarea></br>
        </div>
        <div class="form_group">
        <label for="valoracion">Valoracion</label>
        <select name="valoracion" class="form-control" id="valoracion">
            <option value="<?= $dc->valoracion ?>"><?= $dc->valoracion ?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        </br>
        </div>
        <div class="form_group">
        <input name="idLibro" class="form-control" id="idLibro" placeholder="Ingresar libro" type="hidden" require value="<?= $dc->idLibro ?>"></br>
        </div>
        <div class="form_group">
        <input name="idUsuario" class="form-control" id="idUsuario" placeholder="Ingresar Usuario" type="hidden" require value="<?= $dc->idUsuario ?>"></br>
        </div>
        <input type="hidden" name="idComentario" value="<?= $dc->idComentario ?>" />
        
        <button class="btn btn-success m-1 pl-4 pr-4" >Enviar</button>
        <a class="btn btn-outline-secondary" href="../libros/detalleLibro.php?idLibro=<?= $dc->idLibro ?>" role="button">Regresar</a>
        </div>
    </form>
 
</div>

<?php
  include_once('../includes/footer.php');
?>

</body>
</html>