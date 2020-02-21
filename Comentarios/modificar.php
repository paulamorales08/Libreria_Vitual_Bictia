<?php
include('Comentarios.php');
$comentario1=new Comentario();
$dc=$comentario1->obtenerComentario($_GET['idComentario']);
if(isset($_POST)&&!empty($_POST)){
     $modificar=$comentario1->modificarComentario($_POST);
     if($modificar){
         echo "Registro exitoso";
        
     }else{
         echo "Fallo";
     }

}
?>
<form method="POST">
    <label for="fechaComentario">Fecha</label>
    <input name="fechaComentario" id="fechaComentario" placeholder="Ingresar Fecha" 
    type="text" required  value="<?= $dc->fechaComentario?>"></br>
    <label for="comentario">Comentario</label>
    <textarea name="comentario" id="comentario"><?= $dc->comentario?></textarea></br>
    <label for="valoracion">Valoracion</label>
    <select name="valoracion" id="valoracion">
      <option value="<?= $dc->valoracion?>"><?= $dc->valoracion?></option>    
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
   </br>
    <label for="estado">Estado</label>
    <input name="estado" id="estado" placeholder="Ingresar estado" type="text" require
    value="<?= $dc->estado?>"></br>
    <label for="idLibro">Libro</label>
    <input name="idLibro" id="idLibro" placeholder="Ingresar libro" type="text" require  value="<?= $dc->idLibro?>"></br>
    <label for="idUsuario">Usuario</label>
    <input name="idUsuario" id="idUsuario" placeholder="Ingresar Usuario" type="text" require  value="<?= $dc->idUsuario?>"></br>
    <input type="hidden" name="idComentario" value="<?=$dc->idComentario?>"/>
    <button>Enviar</button>
</form>
