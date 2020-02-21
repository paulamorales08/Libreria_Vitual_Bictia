
<?php
    include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
      include_once('../includes/links.php');
    ?>
    <title>Detalle de Libro</title>
</head>


<body>
    <?php
      include_once('../includes/header.php');
    ?>


  <?php
      include('claseImagen.php');
      $imagen = new Imagen();
      $libro = new Libro();

      if (isset($_GET) && !empty($_GET)) {
          $idLibro = $_GET['idLibro'];
          include('contenidoLibro.php');
      } else {
          echo "No se encontró el libro";
      }
  ?>



<?php
  include_once('../includes/footer.php');
?>

</body>
</html>