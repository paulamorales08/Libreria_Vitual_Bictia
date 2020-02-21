<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle de Imágenes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../includes/estilos.css">
  <link rel="stylesheet" href="../includes/fontawesome/css/all.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Categorías</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Autores</a>
        </li>
      </ul>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar Libro" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>

  <div class="espaciado">
      <br><br>
    </div>


    <?php
    include('claseImagen.php');
    $imagen = new Imagen();
    $libro = new Libro();

    if (isset($_GET) && !empty($_GET)) {
        $id = $_GET['id'];
        $idLibro = $_GET['idLibro'];
        //echo $id;
    } else {
        echo "No hay variable válida";
    }

    $datosDeLaImagen = $imagen->obtenerImagen($id);

    if( isset($_POST) && !empty($_POST) ){
      $modificar = $imagen->modificarImagen($_POST);
      if ($modificar){
          echo '<br><div class="container"><div class="alert alert-success" role="alert">Actualización exitosa.</div></div>';
          $datosDeLaImagen = $imagen->obtenerImagen($id);       
            
        }
        else{
          echo "Ocurrió un error";
        }
  }
?>



  <div class="container w-75 p-3 shadow p-3 mb-5 bg-white rounded text-dark">
          <div class="form-group pt-4">
              <h2 class="text-center font-weight-light">Modificar Imagen</h2>
          </div>

      <form method="POST" enctype="multipart/form-data">

      <div class="form-group w-100">
        <img src='imagenesLibros/<?= $datosDeLaImagen->urlImagen ?>' alt="<?= $datosDeLaImagen->nombreImagen?>" width="200px">
      </div>
      <div class="form-row">
        <div class="col-4">
            <label for="nombreImagen">Nombre de la Imagen</label>
            <input type="text" name="nombreImagen" class="form-control" placeholder="Nombre de la Imagen (ALT)" required value="<?= $datosDeLaImagen->nombreImagen?>">
        </div>
        <div class="col-4">
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
        <div class="col-4">
        <label for="text">Orden</label>
          <input type="text" name="orden" class="form-control" placeholder="Orden" value="<?= $datosDeLaImagen->orden?>">
        </div>
      </div>

      <div class="form-row">
        <div class="col-4">
        <label for="idImagen">Imagen</label><br>
          <input type="text" name="idImagen" class="form-control" placeholder="id Libro" readonly value="<?= $datosDeLaImagen->idImagen?>">
        </div>
        <div class="col-4">
        <label for="idLibro">ID Libro</label>
          <input type="text" name="idLibro" class="form-control" placeholder="idLibro" readonly value="<?= $datosDeLaImagen->idLibro?>">
        </div>
        <div class="col-4">
            <br>
            <button class="btn btn-success">Modificar</button>  
            <a href='index.php?idLibro=<?= $datosDeLaImagen->idLibro?>' class="btn btn-outline-secondary">Volver </a>
        </div>
      </div>      
    </form>
    <br><br>

  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>