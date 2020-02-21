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
     <select name="valoracion" id="valorion">
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
     </select>
     <br>
    <label for="estado">Estado</label>
    <input name="estado" id="estado" placeholder="Ingresar estado" type="text" require></br>
    <label for="idLibro">Libro</label>
    <input name="idLibro" id="idLibro" placeholder="Ingresar libro" type="text" require></br>
    <label for="idUsuario">Usuario</label>
    <input name="idUsuario" id="idUsuario" placeholder="Ingresar Usuario" type="text" require></br>
    <button>Enviar</button>

    <table>
        <th>Fecha</th>
        <th>Comentario</th>
        <th>Valoracion</th>
        <th>Estado</th>
        <th>Libro</th>
        <th>Usuario</th>
        <?php
        while ($come = mysqli_fetch_object($todosLosComentarios)) {
            echo "<tr>";
            echo "<td>$come->fechaComentario</td>";
            echo "<td>$come->comentario</td>";
            echo "<td>$come->valoracion</td>";
            echo "<td>$come->estado</td>";
            echo "<td>$come->idLibro</td>";
            echo "<td>$come->idUsuario</td>";
            echo "<td><a href='modificar.php?idComentario=$come->idComentario'>Modificar</a></td>";
            echo "<td><a href='eliminar.php?idComentario=$come->idComentario'>Eliminar</a></td>";
            echo "</tr>";
        
        }

        ?>
    </table>
</form>