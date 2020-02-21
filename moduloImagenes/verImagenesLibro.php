
<?php
include('../Conn/Database.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../includes/estilos.css">
  <link rel="stylesheet" href="../includes/fontawesome/css/all.css">
  <link rel="shortcut icon" href="../includes/favicon/favicon.ico" />
</head>
<?php
  //include_once('../footer.php');
  include_once('../includes/header.php');
?>

<div class="container-fluid">
<?php 
      if (isset($_GET) && !empty($_GET)) {
        $idLibro = $_GET['idLibro'];
        include_once('listadoImagenesLibro.php');
      } else {
          echo "<br><br><div class='container'>";
          echo '<div class="alert alert-warning" role="alert">No se encontró la varible " <kbd>?idLibro=</kbd>.</div>';
          echo '</div>';
      }
  ?>
</div>


<?php
  include_once('../includes/footer.php');
?>
</body>

</html>