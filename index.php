<?php
include_once('./Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="includes/estilos.css?ver19">
  <link rel="stylesheet" href="includes/fontawesome/css/all.css">
  <link rel="shortcut icon" href="includes/favicon/favicon.ico" />
  <title>Principal Temporal</title>
</head>


<body>
  <?php
  include_once('./includes/header.php');
  ?>

  <?php
  include('./moduloImagenes/claseImagen.php');
  $imagen = new Imagen();
  $libro = new Libro();
  $todasLasImagenes = $imagen->obtenerImagenesRecientes();
  $librosRecientes = $libro->obtenerLibrosRecientes();
  ?>

  <div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark">
    <div class="form-group pt-4">
      <h3 class="text-center font-weight-light texto_verde">Ver Libros Recientes</h3>
    </div>

    <div class="container">
      <table class="table mt-4 tablaImagenes">
        <thead class="thead-dark text-center">
          <tr>
            <th scope="col">Libro</th>
            <th scope="col">Imágenes</th>
            <th scope="col">Descripcion</th>
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
          //var_dump($primeraImagenLibro);  

          //Verificamos si la consulta obtuvo resultados.
          if ($primeraImagenLibro == null) {
            //Si la consulta no trae registros publicamos una imagen genérica.
            echo "<td> <img src='$imagen->root/moduloImagenes/imagenesLibros/imagenNoEncontrada.png' class='d-block' alt='Imagen no encontrada' width='100px'/></td>";
            //echo "<td> Sin imagen</td>";
          } else {
            echo "<td> <img src='$imagen->root/moduloImagenes/imagenesLibros/$primeraImagenLibro->urlImagen' class='d-block' alt='$primeraImagenLibro->nombreImagen' width='100px'/></td>";
            //echo "<td> $primeraImagenLibro->urlImagen</td>";
          }
          //echo "<td class='text-justify'> $recorridoLibro->descripcion </td>";
          echo "<td class='text-justify' style='font-size:.8em'; width='400px'> $recorridoLibro->descripcion </td>" ;
          echo "<td> <a href='libros/detalleLibro.php?idLibro=$recorridoLibro->idLibro' class='btn btn-warning'>Detalle</a></td>" ;



          echo "</tr>";
          echo "</tbody>";
        } ?>
      </table>
    </div>
  </div>

  <?php
  include_once('./includes/footer.php');
  ?>

</body>

</html>