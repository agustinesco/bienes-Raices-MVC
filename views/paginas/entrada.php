<main class="contenedor seccion contenido-centrado">
        <h1><?php echo sanitizarHTML($entrada->titulo) ?></h1>
        <img loading='lazy' src='imagenes/<?php echo $entrada->imagen?>' alt='imagen de la propiedad'>
        <p class="informacion-meta">Escrito el <span><?php echo $entrada->creado?></span> por : <span><?php echo $entrada->autor?></span></p>
        <div class="entrada">
            
            <p class="texto"><?php echo sanitizarHTML($entrada->contenido) ?></p>
        </div>
    </main>