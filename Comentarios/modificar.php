<!DOCTYPE html>//pagina de iniciar comentarios
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Imágenes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/estilos.css">
    <link rel="stylesheet" href="../includes/fontawesome/css/all.css">
</head>
</head>

<body>
    <h2 class="text-center font-weight-light">Modificar Comentarios</h2>
    <?php
    include('Comentarios.php');
    $comentario1 = new Comentario();
    $dc = $comentario1->obtenerComentario($_GET['idComentario']);
    if (isset($_POST) && !empty($_POST)) {
        $modificar = $comentario1->modificarComentario($_POST);
        if ($modificar) {
            echo "Registro exitoso";
        } else {
            echo "Fallo";
        }
    }
    ?>
    <form method="POST" class="m3">
    <div class="form-group">
        <div class="form_group">
        <label for="fechaComentario">Fecha</label>
        <input name="fechaComentario" class="form-control"  id="fechaComentario" placeholder="Ingresar Fecha" type="text" required value="<?= $dc->fechaComentario ?>"></br>
        </div>
        <div class="form_group">
        <label for="comentario">Comentario</label>
        <textarea name="comentario" class="form-control" id="comentario" ><?= $dc->comentario ?></textarea></br>
        </div>
        <div class="form_group">
        <label for="valoracion">Valoracion</label>
        <select name="valoracion" class="form-control" id="valoracion">
            <option value="<?= $dc->valoracion ?>"><?= $dc->valoracion ?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        </br>
        </div>
        <div class="form_group">
        <label for="estado">Estado</label>
        <select name="estado" class="form-control" id="estado">
            <?php if($dc->estado==0){
                echo  "<option value='0'>Inactivo</option>";
                echo  "<option value='1'>Activo</option>";
            }else{
                echo  "<option value='1'>Activo</option>";
                echo  "<option value='0'>Inactivo</option>";
               
            }
            ?>           
        </select>
        </div>
        <div class="form_group">
        <label for="idLibro">Libro</label>
        <input name="idLibro" class="form-control" id="idLibro" placeholder="Ingresar libro" type="text" require value="<?= $dc->idLibro ?>"></br>
        </div>
        <div class="form_group">
        <label for="idUsuario">Usuario</label>
        <input name="idUsuario" class="form-control" id="idUsuario" placeholder="Ingresar Usuario" type="text" require value="<?= $dc->idUsuario ?>"></br>
        </div>
        <input type="hidden" name="idComentario" value="<?= $dc->idComentario ?>" />
        
        <button class="btn btn-success m-1 pl-4 pr-4" >Enviar</button>
        <img border="0" src="1.jpg" width="30" height="30" onClick="history.back()">
        </div>
    </form>
 


</body>

</html>