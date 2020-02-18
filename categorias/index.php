<?php 

echo "hola";




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label for="">Nombre</label>
        <input name='nombre' id="nombre" type="text" placeholder="Ingresa tu nombre" require>
        </br>
        <label for="">Estado</label>
        <input name='descripcion' id='descripcion' type="text" placeholder="Ingresa tu apellido" require>
        </br>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion"></textarea>
        <button>Enviar</button>
    </form>

    <table>
        <th>Nombres</th>
        <th>Estado</th>
        <th>Descripción</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </table>
   

</body>

</html>