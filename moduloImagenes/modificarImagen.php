<div class="container">
    <br>

    <div>
      <h1>Modificar datos de la Imagen</h1>
    </div>

    <?php
    //echo "Bienvenidos al módulo de Imágenes <br>";
    include('claseImagen.php');
    $imagen = new Imagen();
    $libro = new Libro();

    if (isset($_GET) && !empty($_GET)) {
        $id = $_GET['id'];
        //echo $id;
    } else {
        echo "No hay variable válida";
    }

    $datosDeLaImagen = $imagen->obtenerImagen($id);
    //echo $datosDeLaImagen->idLibro;
    //echo $datosDeLaImagen->estado;


    if( isset($_POST) && !empty($_POST) ){
      $modificar = $imagen->modificarImagen($_POST);
      if ($modificar){
          echo '<br><div class="container"><div class="alert alert-success" role="alert">Actualización exitosa.</div></div>';
          $datosDeLaImagen = $imagen->obtenerImagen($id);
          //echo "<br> Se actualizó";
          //header('location:../index.php');
          
        }
        else{
          echo "Ocurrió un error";
        }
  
  }

    ?>

    <form method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-3">
            <img src='imagenesLibros/<?= $datosDeLaImagen->urlImagen ?>' alt="<?= $datosDeLaImagen->nombreImagen?>" width="200px">
        </div>
        <div class="col-sm-2">
            <label for="nombreImagen">Nombre de la Imagen</label>
          <input type="text" name="nombreImagen" class="form-control" placeholder="Nombre de la Imagen (ALT)" required value="<?= $datosDeLaImagen->nombreImagen?>">
        </div>
        <div class="col-sm-2">
            <label for="idImagen">Imagen</label><br>
          <input type="text" name="idImagen" class="form-control" placeholder="id Libro" readonly value="<?= $datosDeLaImagen->idImagen?>">
        </div>
        <div class="col-sm-1">
            <label for="idLibro">ID Libro</label>
          <input type="text" name="idLibro" class="form-control" placeholder="idLibro" readonly value="<?= $datosDeLaImagen->idLibro?>">
        </div>
        <div class="col-sm-1">
        <label for="text">Orden</label>
          <input type="text" name="orden" class="form-control" placeholder="Orden" value="<?= $datosDeLaImagen->orden?>">
        </div>
        <div class="col-sm-2">
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
        <br>
        <div class="col-sm-6">
            <button class="btn btn-success">Modificar</button>  
            <a href='index.php?idLibro=<?= $datosDeLaImagen->idLibro?>' class="btn btn-danger">Volver </a>
        </div>
      </div>
      
    </form>
    <br><br>

  </div>