<?php
include('../includes/links.php');
include('Comentarios.php');
$simulacionIdUsuario=1; //Para confirmar el funcionamiento del modificar comentario.
$comentario1 = new Comentario();
$totalRegistros=0;
$conteo=0;
$valoracionTotal=0;

if (isset($_GET) && !empty($_GET)) {
    $idLibro=$_GET['idLibro'];
    $todosLosComentarios = $comentario1-> todosComentariosLibro($idLibro);  
    $promedioValoracion = $comentario1-> obtenerValoracionTotal($idLibro);
    var_dump($promedioValoracion);
}
?>
    <section class="comentarios">
        <div class="titulo">
            <h2>
            Comentarios del libro
            </h2>
        </div>


        <table>
        <th>Fecha</th>
        <th>Comentario</th>
        <th>Valoracion</th>
        <th>Estado</th>
        <th>Libro</th>
        <th>Usuario</th>
        <?php
        while ($come = mysqli_fetch_object($todosLosComentarios)) {
            echo "<div class='card'>";
            echo "<div class='card-body'>";
                echo "<div class='fechaComentario'><p class='card-text'>$come->fechaComentario - Valoración: $come->valoracion</p></div>";
                echo "<p class='card-text'>$come->comentario</p>";
                echo "<a href='#' class='card-link'>Modificar</a>";
                echo "<a href='#' class='card-link'>Eliminar</a>";
            echo "</div>";
            echo "</div>";
            $valoracionTotal+=$come->valoracion;
            $conteo++; 



        }

        if ($conteo!=0){
            $promedioValoracion= $valoracionTotal/$conteo;    
        }
        echo "Promedio: ". round($promedioValoracion);
       
        ?>
         <img border="0" src="1.jpg" width="30" height="30" onClick="history.back()">
    </table>


        

        
    </section>
    <section class="nuevoComentario">
        <div class="titulo">
            <h2>
            Incluir Comentario
            </h2>
        </div>
        <div class="formulario">
            <form method="POST" enctype="multipart/form-data" class="m3">
            <div class="form-group">
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            <div class="d-flex flex-row-reverse bd-highlight">
            <button class="btn btn-success m-1 pl-4 pr-4" type="submit">Agregar Comentario</button>
            </div>
            </div>
        </form>
        </div>
    </section>