<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Persona</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php

if(isset($_POST) && !empty($_POST)){
  include('usuarios.php');
  $usuario = new Usuario();
  $usuario->crearUsuario($_POST);
  echo (true) ? '<div class="alert alert-success" role="alert">Registro exitoso</div>' : '<div class="alert alert-danger" role="alert">Error al registrar</div>';
} 

?>

<body>

  <div class="container">
    <h1> Bienvenido, registrate! </h1>
    <form method="POST" enctype="multipart/form-data">

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nomUsuario">Nombre Usuario</label>
          <input type="text" class="form-control" id="nomUsuario" name="nomUsuario" placeholder="Ingresa nombre de usuario" required max="50">
        </div>
        <div class="form-group col-md-6">

          <label for="Nombres">Nombres</label>
          <input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Nombres" required max="50">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Apellidos">Apellidos</label>
          <input type="text" class="form-control" id="Apellidos" name="Apellidos" placeholder="Apellidos" required max="50">
        </div>
        <div class="form-group col-md-6">
          <label for="Contrasena">Contraseña</label>
          <input type="password" class="form-control" id="Contrasena" name="Contrasena" placeholder="Ingresa una contraseña" required max="100" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" >
        </div>
      </div>

      <div class="clearfix">
        <button class="btn btn-success float-left" type="submit">Registrar</button>

      </div>
    </form>
  </div>

</body>

</html>