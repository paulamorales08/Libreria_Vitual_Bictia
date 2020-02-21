<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesion!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

<?php

if(isset($_POST) && !empty($_POST)){
    include('usuarios.php');
    $usuario = new Usuario();
    $usuario->consultaUsuario($_POST);
}

?>
    <form method="POST">
        <div class="form-group">
            <label for="Usuario">Usuario</label>
            <input type="text" class="form-control" id="Usuario" name="Usuario" >
            
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password">
        </div>
        
        <button type="submit" class="btn btn-success">Iniciar sesion</button>
    </form>
</body>

</html>