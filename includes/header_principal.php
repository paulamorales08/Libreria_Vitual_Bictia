<?php
echo "Este es el encabezado Principal <br>";
//Sesion
    include('usuarios/usuarios.php');
    $usuario = new Usuario();
?>

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
      <!-- Inicio Categorias -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorías
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            [Aqui van las categorias]
        </div>
      </li>

      <!-- Fin Categorias -->
      <li class="nav-item">
        <a class="nav-link" href="#">Autores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="modulosImagenes/">Imagenes</a>
      </li>
    </ul>
      <?php
          if (isset($_SESSION['idUsuario'])) {
            $Nombre = $_SESSION['Nombre'];
            $Apellido = $_SESSION['Apellido'];
            echo "Bienvenido: ". $Nombre . " " .$Apellido;
            echo "<a href='..//usuarios/logOut.php' class='btn btn-btn'>Cerrar sesión</a>";
          }else{
            echo "<a href='../usuarios/registroUsuario.php' class='btn btn-btn'>Registrarse</a>";
            echo "<a href='../usuarios/login.php' class='btn btn-btn'> Iniciar Sesión</a>";
          }
      ?>
  </div>
</nav>

<div class="espaciado"><br><br>
</div>