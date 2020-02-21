<?php
    include('claseImagen.php');
    $imagen = new Imagen();
    $libro = new Libro();
    $todasLasImagenes = $imagen->obtenerImagenesRecientes();
    $librosRecientes = $libro->obtenerLibrosRecientes();
    ?>

<div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark">
        <div class="form-group pt-4">
            <h2 class="text-center font-weight-light">Administrador de Imágenes</h2>
            <h3 class="text-center font-weight-light texto_verde">Libros Recientes</h3>
        </div>

      <div class="container">
            <table class="table mt-4 tablaImagenes">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Imágenes</th>
                    </tr>
                </thead>

        <?php
        while ($recorridoLibro = mysqli_fetch_object($librosRecientes)) {
          echo "<tbody>";
          echo "<tr class='text-center'>";
          echo "<td> $recorridoLibro->nombreLibro </td>";
            //Consulta a la tabla de Imagenes
            $idLibro = $recorridoLibro->idLibro;
            $primeraImagenLibro = $imagen->obtenerPrimeraImagen($idLibro);
            //echo "<td> $primeraImagenLibro->urlImagen</td>";
            echo "<td> <img src='$imagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' class='d-block w-100' alt='$primeraImagenLibro->nombreImagen' width='300px'/></td>";


          echo "<td class='text-justify'> $recorridoLibro->descripcion </td>";
          echo "<td> <a href='modificarLibro.php?id=$recorridoLibro->idLibro' class='btn btn-outline-success'>Modificar</a></td>" ;
          echo "<td> <a href='?idLibro=$recorridoLibro->idLibro' class='btn btn-outline-success'>Imágenes</a></td>" ;



          echo "</tr>";
          echo "</tbody>";
        } ?>
      </table>


    </div>