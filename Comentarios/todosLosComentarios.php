<?php
include('Comentarios.php');
$comentario1 = new Comentario();
$rol=1;
$usuarioLogin=3;
$valoraciontotal=0;
if (isset($_GET) && !empty($_GET)) {
    $idLibro=$_GET['idLibro'];
    $comentarios = $comentario1->verTodos($idLibro);
}
//$todosLosComentarios = $comentario1->obtenerComentarios();
?>

    <table>
        <th>Fecha</th>
        <th>Comentario</th>
        <th>Valoracion</th>
        <th>Estado</th>
        <th>Libro</th>
        <th>Usuario</th>
        <?php
        while ($come = mysqli_fetch_object($comentarios)) {
            echo "<tr>";
            echo "<td>$come->fechaComentario</td>";
            echo "<td>$come->comentario</td>";
            echo "<td>$come->valoracion</td>";
            echo "<td>$come->estado</td>";
            echo "<td>$come->idLibro</td>";
            echo "<td>$come->idUsuario</td>";
            if($come->idUsuario==$usuarioLogin){
                echo "<td><a href='modificar.php?idComentario=$come->idComentario'>Modificar</a></td>";
            }
            
            echo "</tr>";
            $valoraciontotal+=$come->valoracion;
        
        }

         echo $valoraciontotal;
        if(empty($usuarioLogin)){
            echo "debe loguearse";
        } else{
            
            include('formulario.php');
        }
               ?>
    </table>