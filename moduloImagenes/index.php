
<?php
    include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
      include_once('../includes/links.php');
    ?>
    <title>Módulo de Imágenes</title>
</head>


<body>
    <?php
      include_once('../includes/header.php');
    ?>

    <div class="container-fluid">
      <?php 
            if (isset($_GET) && !empty($_GET)) {
              $idLibro = $_GET['idLibro'];
              include_once('adminImagenes.php');
            } else {
              include_once('verLibrosRecientes.php');
            }
        ?>
    </div>


<?php
  include_once('../includes/footer.php');
?>

</body>
</html>