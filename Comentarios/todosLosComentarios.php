<?php
include('../includes/links.php');
include_once('Comentarios.php');
$simulacionIdUsuario= $_SESSION['idUsuario']; //Para confirmar el funcionamiento del modificar  comentario.
$comentario1 = new Comentario();
$totalRegistros=0;
$conteo=0;
$valoracionTotal=0;
$promedioValoracion = 0;
$promedioRedondeado=0;
$rol=$_SESSION['rol'];
echo $rol;

if (isset($_POST) && !empty($_POST)) {
    $insert = $comentario1->crearComentario($_POST);
    if ($insert) {
        echo "<br><div class='container'><div class='alert alert-success' role='alert'>Comentario registrado satisfactoriamente.</div></div>";
    } else {
        echo "<div class='alert alert-warnig' role='alert'>Ocurrió un error al registrar el comentario.</div>";
    }
}

if (isset($_GET) && !empty($_GET)) {
    $idLibro=$_GET['idLibro'];
    $todosLosComentarios = $comentario1-> todosComentariosLibro($idLibro);  
}

?>
    <section class="comentarios">
        <div class="titulo">
            <h2>
            Comentarios del libro
            </h2>
        </div>

        <?php
        while ($come = mysqli_fetch_object($todosLosComentarios)) {
            echo "<div class='card'>";
            echo "<div class='card-body'>";
                echo "<div class='valores'><div class='fechaComentario'><strong>Usuario: </strong>Anónimo <strong>Fecha de Publicación:</strong> $come->fechaComentario</div>";
                switch ($come->valoracion) {
                    case 0:
                        echo " <div class='valoracion'><strong>Valoración:</strong> <img src='../includes/imagenes/valoracion_cero.png' alt='Valoración 0' width='80px'></div></div>";
                        break;
                    case 1:
                        echo " <div class='valoracion'><strong>Valoración:</strong> <img src='../includes/imagenes/valoracion_uno.png' alt='Valoración 1' width='80px'></div></div>";
                        break;
                    case 2:
                        echo " <div class='valoracion'><strong>Valoración:</strong> <img src='../includes/imagenes/valoracion_dos.png' alt='Valoración 3' width='80px'></div></div>";
                        break;
                    case 3:
                        echo " <div class='valoracion'><strong>Valoración:</strong> <img src='../includes/imagenes/valoracion_tres.png' alt='Valoración 3' width='80px'></div></div>";
                        break;
                    case 4:
                        echo " <div class='valoracion'><strong>Valoración:</strong> <img src='../includes/imagenes/valoracion_cuatro.png' alt='Valoración 4' width='80px'></div></div>";
                        break;
                    case 5:
                        echo " <div class='valoracion'><strong>Valoración:</strong> <img src='../includes/imagenes/valoracion_cinco.png' alt='Valoración 5' width='80px'></div></div>";
                        break;
                }
                
                 echo "<p class='card-text'>$come->comentario</p>";
                 echo "usuario $come->idUsuario</br>";
                 echo "rol:$rol </br>";
                if($simulacionIdUsuario==$come->idUsuario){

                    echo ('El usuario puede modificar');
               // echo "<a href='../Comentarios/modificar.php?idComentario=$come->idComentario&idLibro=$idLibro' class='card-link'>Modificar</a>";
                }
                if($rol==0){
                    echo ("el usuario puedo eliminar");
                //echo "<a href='../Comentarios/Eliminar.php?idComentario=$come->idComentario&idLibro=$idLibro' class='card-link'>Eliminar</a>";
               }
                
            echo "</div>";
            echo "</div>";
            $valoracionTotal+=$come->valoracion;
            $conteo++; 
        }

        if ($conteo!=0){
            $promedioValoracion= $valoracionTotal/$conteo;    
            echo "Promedio: $promedioValoracion <br>";
        }
        $promedioRedondeado = round($promedioValoracion);
        echo "Promedio Redondeado: ". $promedioRedondeado;
       
        ?>
         <div class="btn btn-primary btn-sm" onclick="history.back()">Regresar</div>



        
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
                <label for="">id Libro</label>
                <input name="idLibro" id="idLibro" class="form-control" placeholder="Ingresar libro" type="text" readonly value="<?=$idLibro?>">
            </div>
                <label for="idUsuario">Usuario</label>
                <input name="idUsuario" id="idUsuario" class="form-control" placeholder="Ingresar Usuario" type="text" readonly value="<?=$simulacionIdUsuario?>"></br>
            <div class="form-group">
                <label for="">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="1" readonly>
            </div>
            <div class="form-group">
                <label for="fechaComentario">Fecha</label>
                <input name="fechaComentario" id="fechaComentario" class="form-control" placeholder="Ingresar Fecha" type="date" required></br>
            </div>
            
            <div class="form-group">
            <textarea name="comentario" id="comentario" cols="30" rows="5" class="form-control"></textarea>
            <label for="">Valoración</label>
            <select name="valoracion" id="valoracion" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <div class="d-flex flex-row-reverse bd-highlight">
            <button class="btn btn-success m-1 pl-4 pr-4" type="submit">Agregar Comentario</button>
            </div>
            </div>
        </form>
        </div>
    </section>




