<main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
        <div class="blog">
            <?php foreach($entradas as $entrada): ?>
                <article class="entrada-blog">
                    <div class="imagen">
                        <img loading="lazy" src="imagenes/<?php echo $entrada->imagen?>" alt="imagen de la entrada de blog 1">
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada?id=<?php echo $entrada->id ?>">
                            <h4><?php echo sanitizarHTML($entrada->titulo) ?></h4>
                            <p>Escrito el: <span><?php echo sanitizarHTML($entrada->creado) ?></span> por: <span><?php echo sanitizarHTML($entrada->autor) ?></span></p>

                            <p>
                                <?php echo sanitizarHTML($entrada->descripcion) ?>
                            </p>
                        </a>
                    </div>

                </article> <!--entrada de blog-->

            <?php endforeach; ?>

        </div>
    </main>