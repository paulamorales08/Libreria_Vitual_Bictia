<?php
include('Comentarios.php');
$comentario1 = new Comentario();
if (isset($_POST) && !empty($_POST)) {
    $insert = $comentario1->crearComentario($_POST);
    if ($insert) {
        echo "Registro exitoso";
    } else {
        echo "Fallo";
    }
}
$todosLosComentarios = $comentario1->obtenerComentarios();
?>
<form method="POST">
    <label for="fechaComentario">Fecha</label>
    <input name="fechaComentario" id="fechaComentario" placeholder="Ingresar Fecha" type="text" require></br>
    <label for="comentario">Comentario</label>
    <textarea name="comentario" id="comentario"></textarea></br>
    <label for="valoracion">Valoracion</label>
    <input name="valoracion" id="valoracion" placeholder="Ingresar valoracion" type="text" require></br>
    <label for="estado">Estado</label>
    <input name="estado" id="estado" placeholder="Ingresar estado" type="text" require></br>
    <label for="idLibro">Libro</label>
    <input name="idLibro" id="idLibro" placeholder="Ingresar libro" type="text" require></br>
    <label for="idUsuario">Usuario</label>
    <input name="idUsuario" id="idUsuario" placeholder="Ingresar Usuario" type="text" require></br>
    <button>Enviar</button>
</form>