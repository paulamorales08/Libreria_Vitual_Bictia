<?php
include('Categorias.php');
$categoria = new Categoria();
$dp = $categoria->obtenerCategoria($_GET['idCategoria']);


if (isset($_POST) && !empty($_POST)) {
    $modificar = $categoria->modificarCategoria($_POST);
    if ($modificar) {
        header('location:index.php');
    } else {
        echo "Error al modificar";
    }
}
?>

<form method="POST">
    <label for="">Nombre</label>
    <input name='nombreCategoria' id="nombreCategoria" type="text" placeholder="Ingresa tu nombre" require value="<?= $dp->nombreCategoria ?>">
    </br>
    <select name='estado' id='estado' type="text" require value="<?= $dp->estado ?>">
        <?php     
        if ($dp->estado == 1) {
            echo "<option value='1'>Activo</option>";
            echo "<option value='0'>Inactivo</option>";

        }else{
            echo "<option value='0'>*Inactivo</option>";
            echo "<option value='1'>*Activo</option>";
        } ?>
        
    </select>
    <?php echo "$dp->estado"  ?>
    <input name='idCategoria' id='idCategoria' type="text" placeholder="Ingresa la categoria" require readonly value="<?= $dp->idCategoria ?>">
    </br>
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" id="descripcion" value="<?= $dp->descripcion ?>"></textarea>
    <button>Modificar</button>
</form>