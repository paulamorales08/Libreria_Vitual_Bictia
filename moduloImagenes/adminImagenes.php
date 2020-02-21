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

<div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark">
        <div class="form-group pt-4">
            <h2 class="text-center font-weight-light">Administrador de Imágenes</h2>
            <h3 class="text-center font-weight-light texto_verde"><?= "$datosDelLibro->nombreLibro" ?></h3>
        </div>



      <form method="POST" enctype="multipart/form-data" class="m3">
        <div class="form-group">
            <div class="form_group">
            <label for="">Nombre de la Imagen</label>
                <input type="text" class="form-control" name="nombreImagen" placeholder="Nombre de la Imagen" required>
            </div>
            <div class="form_group">
            <label for="">Posición de la Imagen</label>
                <input type="text" class="form-control" name="orden" placeholder="Posición" required>
            </div>
            <div class="form_group">
                <input type="hidden" class="form-control" name="idLibro" placeholder="idLibro" readonly value="<?= $idLibro ?>">
            </div>
            <div class="form_group">
            <label for="">Agregue el Archivo</label>
                <input type="file"  class="form-control" id="urlImagen" name="urlImagen" accept="image/png, image/jpeg" required />
            </div>
            <div class="d-flex flex-row-reverse bd-highlight">
              <button class="btn btn-success m-1 pl-4 pr-4" type="submit">Agregar Imagen</button>
            </div>
        </div>

      </form>
      <div class="container">
            <table class="table mt-4 tablaImagenes">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Nro.</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">URL</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>

        <?php
        echo "<tbody>";
        while ($imagenLibro = mysqli_fetch_object($todasLasImagenes)) {
          echo "<tr class='text-center'>";
          echo "<td> $imagenLibro->orden </td>";
          echo "<td> $imagenLibro->nombreImagen </td>";
          echo "<td> $imagenLibro->urlImagen </td>";
              if ($imagenLibro->estado == 1) {
                  echo "<td> <div><img src='$imagen->root/moduloImagenes/imagenesLibros/$imagenLibro->urlImagen' alt='$imagenLibro->nombreImagen' width='100px'/></div></td>";
                  echo "<td> Activo </td>";
              } else {
                  echo "<td> <div class='imagen_inactiva'><img src='$imagen->root/moduloImagenes/imagenesLibros/$imagenLibro->urlImagen' alt='$imagenLibro->nombreImagen' width='100px'/></div></td>";
                  echo "<td> Inactivo </td>";
              }
          echo "<td> <a href='modificarImagen.php?id=$imagenLibro->idImagen&idLibro=$imagenLibro->idLibro' class='btn btn-outline-success'>Modificar</a></td>" ;
          echo "<td> <a href='eliminarImagen.php?id=$imagenLibro->idImagen&idLibro=$imagenLibro->idLibro' class='btn btn-outline-danger'>Eliminar</a></td>";
          echo "</tr>";
        } 
        echo "</tbody>";
        ?>
      </table>


    </div>