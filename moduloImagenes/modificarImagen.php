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
    include_once('claseImagen.php');
    $imagen = new Imagen();
    $libro = new Libro();

    if (isset($_GET) && !empty($_GET)) {
        $id = $_GET['id'];
        $idLibro = $_GET['idLibro'];
        //echo $id;
    } else {
        echo "No hay variable válida";
    }

    $datosDeLaImagen = $imagen->obtenerImagen($id);

    if( isset($_POST) && !empty($_POST) ){
      $modificar = $imagen->modificarImagen($_POST);
      if ($modificar){
          echo '<br><div class="container"><div class="alert alert-success" role="alert">Actualización exitosa.</div></div>';
          $datosDeLaImagen = $imagen->obtenerImagen($id);       
            
        }
        else{
          echo "Ocurrió un error";
        }
  }
?>

<div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark">
          <div class="form-group pt-4">
              <h2 class="text-center font-weight-light">Modificar Imagen</h2>
          </div>

      <form method="POST" enctype="multipart/form-data">

      <div class="form-group w-100">
        <img src='imagenesLibros/<?= $datosDeLaImagen->urlImagen ?>' alt="<?= $datosDeLaImagen->nombreImagen?>" width="200px">
      </div>
      <div class="form-row">
        <div class="col-4">
            <label for="nombreImagen">Nombre de la Imagen</label>
            <input type="text" name="nombreImagen" class="form-control" placeholder="Nombre de la Imagen (ALT)" required value="<?= $datosDeLaImagen->nombreImagen?>">
        </div>
        <div class="col-4">
            <label for="text">Estado</label>
            <select name="estado" id="estado" class="form-control">

            <?php  
              if($datosDeLaImagen->estado == 1){
                echo "<option value='1'>Activo *</option>";
                echo "<option value='0'>Inactivo</option>";
              }
              else{
                echo "<option value='0'>Inactivo *</option>";
                echo "<option value='1'>Activo</option>";
              }
            ?>
            </select>
        </div>
        <div class="col-4">
        <label for="text">Orden</label>
          <input type="text" name="orden" class="form-control" placeholder="Orden" value="<?= $datosDeLaImagen->orden?>">
        </div>
      </div>

      <div class="form-row">
        <div class="col-4">
        <label for="idImagen">Imagen</label><br>
          <input type="text" name="idImagen" class="form-control" placeholder="id Libro" readonly value="<?= $datosDeLaImagen->idImagen?>">
        </div>
        <div class="col-4">
        <label for="idLibro">ID Libro</label>
          <input type="text" name="idLibro" class="form-control" placeholder="idLibro" readonly value="<?= $datosDeLaImagen->idLibro?>">
        </div>
        <div class="col-4">
            <br>
            <button class="btn btn-success">Modificar</button>  
            <a href='index.php?idLibro=<?= $datosDeLaImagen->idLibro?>' class="btn btn-outline-secondary">Volver </a>
        </div>
      </div>      
    </form>
    <br><br>

  </div>



<?php
  include_once('../includes/footer.php');
?>

</body>
</html>