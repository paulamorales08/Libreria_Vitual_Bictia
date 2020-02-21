<?php
    include('claseImagen.php');
    $imagen = new Imagen();
    $libro = new Libro();
    $todasLasImagenes = $imagen->obtenerImagenesRecientes();
    ?>

<div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark">
        <div class="form-group pt-4">
            <h2 class="text-center font-weight-light">Administrador de Imágenes</h2>
            <h3 class="text-center font-weight-light texto_verde">Imágenes Recientes</h3>
        </div>

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
                    </tr>
                </thead>

        <?php
        $conteo = 5;
        while ($imagenLibro = mysqli_fetch_object($todasLasImagenes)) {
          echo "<tbody>";
          echo "<tr class='text-center'>";
          echo "<td> $conteo </td>";
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
          echo "</tr>";
          echo "</tbody>";
          $conteo--;
        } ?>
      </table>


    </div>