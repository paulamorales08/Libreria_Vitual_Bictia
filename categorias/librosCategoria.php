<?php
    include_once('../Conn/Database.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php
      include_once('../includes/links.php');
    ?>
    <title>Libros en Categoría</title>
</head>


<body>
    <?php
      include_once('../includes/header.php');
    ?>


    <?php
    include_once('../includes/header.php');
    include_once('Categorias.php');
    include_once('../moduloImagenes/claseImagen.php');

    $imagen = new Imagen();
    $categoria = new Categoria();

    if (isset($_GET) && !empty($_GET)) {
        $consultaLibro = $_GET['idCategoria'];
        $todosLibros = $categoria->filtroLibrosCategoria($consultaLibro);
        include_once('librosRecientes.php');
    } else {
        $todosLibrosSinCategoria = $categoria->librosRecientes();
        include_once('librosRecientesSinCategoria.php');
    }
    ?>

<?php
  include_once('../includes/footer.php');
?>

</body>
</html>