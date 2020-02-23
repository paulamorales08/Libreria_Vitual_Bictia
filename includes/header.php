<?php
    include_once(PATH . "/usuarios/usuarios.php");
    $usuario = new Usuario();
    session_start();

// CATEGORIAS INICIO
include(PATH . '/categorias/Categorias.php');

$categoria = new Categoria();
$categorias = $categoria->obtenerCategorias();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= ROOT ?>">Principal <span class="sr-only">(current)</span></a>
      </li>
      <!-- Inicio Categorias -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorías
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
          while ($recorridoTodasCat = mysqli_fetch_object($categorias)) {
            echo "<a class='dropdown-item' href='$categoria->root/categorias/librosCategoria.php?idCategoria=$recorridoTodasCat->idCategoria'>$recorridoTodasCat->nombreCategoria</a>";
          }
          
          ?>
        </div>
      </li>

      <!-- Fin Categorias -->

          <?php
          if (isset($_SESSION['rol']) && ($_SESSION['rol'])==0){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ADMINISTRADOR
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class='dropdown-item' href='<?= ROOT ?>/categorias/principal.php'>Incluir Categorías</a>
                <a class='dropdown-item' href='<?= ROOT ?>/libros/principalAutor.php'>Incluir Autores</a>
                <a class='dropdown-item' href='<?= ROOT ?>/libros/principalEditorial.php'>Incluir Editorial</a>
                <a class='dropdown-item' href='<?= ROOT ?>/libros'>Incluir Libros</a>
                <a class='dropdown-item' href='<?= ROOT ?>/moduloImagenes/'>Incluir Imágenes</a>
            </div>
          </li>
          
        <?php
        }
        ?>


    </ul>
    <form class="form-inline">
      <input class="form-control mr-sm-1" type="search" placeholder="Buscar Libro" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>

    <div class="datos_sesion">
      <?php

          if (isset($_SESSION['idUsuario'])) {
            $Nombre = $_SESSION['Nombre'];
            $Apellido = $_SESSION['Apellido'];
            echo "Bienvenido $Nombre $Apellido";
            echo "<a href='$categoria->root/usuarios/logOut.php' class='btn btn-btn'> Cerrar sesión</a>";
          }else{
            echo "<a href='$categoria->root/usuarios/registroUsuario.php' class='btn btn-btn'>Registrarse</a>";
            echo "<a href='$categoria->root/usuarios/login.php' class='btn btn-btn'> Iniciar Sesión</a>";
          }
      ?>
    </div>
 
      

  </div>
</nav>

<div class="espaciado">
  <br><br>
</div>