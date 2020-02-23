<?php
include_once('Comentarios.php');

if (isset($_SESSION['idUsuario']) && !empty($_SESSION['idUsuario'])){
    $usuarioLogueado = 1;
    $rol = $_SESSION['rol'];
    $idUsuario = $_SESSION['idUsuario'];
}
else{
    $usuarioLogueado=0;
    $idUsuario=null;
}

$comentario1 = new Comentario();
$totalRegistros=0;
$conteo=0;
$valoracionTotal=0;
$promedioValoracion = 0;
$promedioRedondeado=0;

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
                 if($usuarioLogueado ==1){
                        if($idUsuario==$come->idUsuario){
                            echo "<a href='../Comentarios/modificar.php?idComentario=$come->idComentario' class='btn btn-outline-success'>Modificar Comentario</a> ";
                        }
                        if($rol==0){
                            echo "<a href='../Comentarios/Eliminar.php?idComentario=$come->idComentario&idLibro=$come->idLibro' class='btn btn-outline-danger'>Eliminar Comentario</a>";
                        }

                }
                
                
                
            echo "</div>";
            echo "</div>";
            $valoracionTotal+=$come->valoracion;
            $conteo++; 
        }

        // if ($conteo!=0){
        //     $promedioValoracion= $valoracionTotal/$conteo;    
        //     echo "Promedio: $promedioValoracion <br>";
        // }
        // $promedioRedondeado = round($promedioValoracion);
        // echo "Promedio Redondeado: ". $promedioRedondeado;
       
        ?>




        
    </section>
<?php
        if($usuarioLogueado ==1){            
        setlocale(LC_TIME, 'es_CO'); # Localiza en español es_Colombia
        date_default_timezone_set('America/Bogota');
        $fechaactual = date("d-m-Y");
?>
    <section class="nuevoComentario">
        <div class="titulo">
            <h2>
            Incluir Comentario
            </h2>
        </div>
        <div class="formulario">
            <form method="POST" enctype="multipart/form-data" class="m3">

                <input name="idLibro" id="idLibro" class="form-control" placeholder="Ingresar libro" type="hidden" readonly value="<?=$idLibro?>">
                <input name="idUsuario" id="idUsuario" class="form-control" placeholder="Ingresar Usuario" type="hidden" readonly value="<?=$idUsuario?>"></br>
                <input type="hidden" class="form-control" id="estado" name="estado" value="1" readonly>
                <input name="fechaComentario" id="fechaComentario" class="form-control" placeholder="Ingresar Fecha" type="hidden" required readonly value="<?= $fechaactual ?>"></br>
            
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

<?php
}
?>




