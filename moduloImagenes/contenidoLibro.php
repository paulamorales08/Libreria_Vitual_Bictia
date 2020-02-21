<section class="contenedor">
    <div class="imagenLibro">
        <?php

            include_once('listadoImagenesLibro.php');

        ?>
    </div>
    <div class="datosLibro">
        <div class="nombreLibro">
        <h1>
            Nombre del Libro
        </h1>
        </div>
        <div class="nombreAutor">Autor</div>
        <div class="publicacion">Año de Publicación - Categoría:</div>
        <div class="descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptate rerum aspernatur, magnam similique temporibus dolorum voluptatem ea ad ex reprehenderit tenetur eaque, possimus mollitia neque labore aut omnis quae.</div>

        <div class="valoracion">***** </div>
        <div class="precio">$ 00.000</div>



    </div>
</section>
    <section class="comentarios">
        <div class="titulo">
            <h2>
            Comentarios del libro
            </h2>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="fechaComentario">Fecha de publicación del comentario</div>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde quas molestiae magni repellendus at, ratione corporis, doloribus voluptatum dicta officia ab quos quae rerum placeat mollitia, minus autem neque atque.</p>
                <a href="#" class="card-link">Modificar</a>
                <a href="#" class="card-link">Eliminar</a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="fechaComentario">Fecha de publicación del comentario</div>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde quas molestiae magni repellendus at, ratione corporis, doloribus voluptatum dicta officia ab quos quae rerum placeat mollitia, minus autem neque atque.</p>
                <a href="#" class="card-link">Modificar</a>
                <a href="#" class="card-link">Eliminar</a>
            </div>
        </div>
        
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
