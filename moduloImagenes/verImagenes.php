  <div class="container">
    <br>



    <?php
    //echo "Bienvenidos al módulo de Imágenes <br>";
    include('claseImagen.php');
    $imagen = new Imagen();
    $libro = new Libro();

    if (isset($_POST) && !empty($_POST)) {
      $_POST['urlImagen'] = '';
      if (isset($_FILES['urlImagen'])) {
        $errors = array();
        $file_name = str_replace(' ', '', $_FILES['urlImagen']['name']);
        $file_tmp = $_FILES['urlImagen']['tmp_name'];
        $_POST['urlImagen'] = $file_name;
        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/Libreria_Vitual_Bictia/ModuloImagenes/imagenesLibros/' . $_POST['urlImagen']);
      }

      $incluir = $imagen->incluirImagen($_POST);
    }

    $todasLasImagenes = $imagen->obtenerImagenes($idLibro);
    $datosDelLibro = $libro->obtenerLibro($idLibro);
    $idAutor = $datosDelLibro->idAutor;
    $autor = $libro->obtenerAutores($idAutor);
    ?>

    <div>

      <h2>Libro: <strong><?= "$datosDelLibro->nombreLibro" ?></strong></h2>
      <h2>Agregar nueva imagen</h2>
      <br>

      <form method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="col-3">
            <input type="text" class="form-control" name="nombreImagen" placeholder="Nombre de la Imagen (ALT)" required>
          </div>
          <div class="col-2">
            <input type="text" class="form-control" name="orden" placeholder="Posición" required>
          </div>
          <div>
            <input type="hidden" class="form-control" name="idLibro" placeholder="idLibro" readonly value="<?= $idLibro ?>">
          </div>
          <div class="col-auto">
            <input type="file" id="urlImagen" name="urlImagen" accept="image/png, image/jpeg" required />
          </div>
          <div class="col-2">
            <button class="btn btn-success float-left" type="submit">Crear</button>
          </div>
        </div>

      </form>
      <br><br>

      <h2>Listado de Imágenes</h2>
      <br>
      <table class="table table-hover" id='todasLasImagenes'>
        <tr>
          <th> Nro. </th>
          <th> Nombre </th>
          <th> Url </th>
          <th> Imagen </th>
          <th> Estado </th>
          <th> Acciones </th>
        </tr>

        <?php
        while ($imagenLibro = mysqli_fetch_object($todasLasImagenes)) {
          echo "<tr>";
          echo "<td> $imagenLibro->orden </td>";
          echo "<td> $imagenLibro->nombreImagen </td>";
          echo "<td> $imagenLibro->urlImagen </td>";
          echo "<td> <img src='$imagen->root/moduloImagenes/imagenesLibros/$imagenLibro->urlImagen' alt='$imagenLibro->nombreImagen' width='100px'/></td>";
          if ($imagenLibro->estado == 1) {
            echo "<td> Activo </td>";
          } else {
            echo "<td> Inactivo </td>";
          }
          echo "<td> <a href='obtenerImagen.php?id=$imagenLibro->idImagen'> <img src='../includes/imagenes/icono_modificar.png'></a>";
          echo "<a href='eliminarImagen.php?id=$imagenLibro->idImagen&idLibro=$imagenLibro->idLibro'><img src='../includes/imagenes/icono_eliminar.png'> </a></td>";
          echo "</tr>";
        } ?>
      </table>


    </div>