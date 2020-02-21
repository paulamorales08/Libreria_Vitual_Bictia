<?php
include('Comentarios.php');
$comentario1 = new Comentario();
$valoraciontotal=0;
$conteo=0;
$promedioValoracion=0;
if (isset($_GET) && !empty($_GET)) {
$idLibro=$_GET['idLibro'];
$todosLosComentarios = $comentario1-> todosComentariosLibro($idLibro);   
}

?>

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
            echo "</tr>";
            $valoraciontotal+=$come->valoracion;
            $conteo++;
        }
        $promedioValoracion= $valoraciontotal/$conteo;
        echo round($promedioValoracion);
       
        ?>
         <img border="0" src="1.jpg" width="30" height="30" onClick="history.back()">
    </table>
