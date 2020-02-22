<?php
require('../Conn/Database.php');
$Holi = new Databse();

session_start();

if (isset($_SESSION["id_usuario"])) {
    header("Location: http://localhost//Libreria_Vitual_Bictia/");
}

if (!empty($_POST)) {
    $usuario = $_POST['Usuario'];
    $password = $_POST['Password'];
    $error = '';

    $sha1_pass = $password;

    $sql = "SELECT * FROM usuarios WHERE nombreUsuario = '$usuario' AND contrasena = '$sha1_pass'";
    $result = mysqli_query($Holi->connectToDatabase(),$sql);
    $rows = $result->num_rows;

   

    if ($rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['idUsuario'] = $row['idUsuario'];
        $_SESSION['rol'] = $row['idRol'];
        $_SESSION['Nombre'] = $row['nombres'];
        $_SESSION['Apellido'] = $row['apellidos'];

        header("location: http://localhost//Libreria_Vitual_Bictia/");
    } else {
        $error = "Usuario o Password incorrectos. Por favor intente de nuevo";
    }
}
?>
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>


<div class="container">
    <h1> Iniciar sesión! </h1>
    <form method="POST" enctype="multipart/form-data">

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Usuario">Nombre Usuario</label>
          <input type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Ingresa usuario" required max="50">
        </div> 
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="Password">Password</label>
          <input type="Password" class="form-control" id="Password" name="Password" placeholder="Ingresa password" required max="50">
        </div>
      </div>

      <div class="clearfix">
        <button class="btn btn-success float-left" type="submit">Iniciar sesion</button>

      </div>
    </form>
  </div>

    <div style="font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : ''; ?></div>
</body>

</html>