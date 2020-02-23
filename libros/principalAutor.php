<?php
    include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
      include_once('../includes/links.php');
    ?>
    <title>Administrador de Autores</title>
</head>


<body>
    <?php
      include_once('../includes/header.php');
    ?>


<?php
    include('autor.php');
    $autor = new Autores();

    if ( isset($_POST) && !empty($_POST) ) {
        $insert = $autor->crearAutor($_POST);
        if ($insert) {
            echo "Registro exitoso";
        }else{
            echo "Fallo el registro del Autor";
        }
    }
?>
<br>

<div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark">
  <div class="form-group pt-4">
      <h2 class="text-center font-weight-light">Registro de Autor</h2>
  </div>
    <form  method="POST" class="w-100 p-4">
      <div class="form-group">
          <label for="libro">Nombre del Autor</label>
          <input name='nombreAutor' id="nombreAutor" type="text" placeholder="Ingresa el Autor" require class="form-control">
      </div>
      <div>
      </div>

      <br>
      <button class="btn btn-success">Registrar Autor</button>
      <a class="btn btn-outline-secondary" href="../libros" role="button">Regresar</a>
      <br><br>
  </form>
</div>

<?php
  include_once('../includes/footer.php');
?>

</body>
</html>