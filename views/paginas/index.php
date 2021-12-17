<main class="contenedor seccion index-iconos">
        <h2 data-cy="heading-nosotros">Más sobre nosotros</h2>
        <?php include 'iconos.php' ?>
    </main>


    <section class="seccion contenedor los-anuncios">
        <h2>Casas y depas en Venta</h2>

        <?php
           include 'listado.php' 
         ?>

        
        <div class="ver-todas alinear-derecha">
            <a href="/propiedades" class="boton-verde" data-cy="ver-propiedades">Ver Propiedades</a>
        </div>
    </section>

    <section class="seccion imagen-contacto" >
        <div class="contenedor imagen-contacto-contenido" data-cy="contacto">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum id nobis quos enim, tempora ducimus expedita facilis corporis repellendus molestias officia suscipit inventore ut, veritatis at quibusdam omnis nihil dignissimos.</p>
            <a href="/contacto" class="boton-amarillo">Contactanos</a>
        </div>
    </section>

    <div class="contenedor seccion seccion-inferior index-blog">
        <section class="blog" data-cy="blog">
            <h3>Nuestro Blog</h3>

            <?php foreach($entradas as $entrada): ?>
                <article class="entrada-blog" data-cy="entrada-blog">
                    <div class="imagen">
                        <img loading="lazy" src="imagenes/<?php echo $entrada->imagen ?>" alt="imagen de la entrada de blog 1">
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada?id=<?php echo $entrada->id ?>">
                            <h4><?php echo sanitizarHTML($entrada->titulo) ?></h4>
                            <p class="informacion-meta">Escrito el: <span><?php echo sanitizarHTML($entrada->creado) ?></span> por: <span><?php echo sanitizarHTML($entrada->autor) ?></span></p>
                            <p><?php echo sanitizarHTML($entrada->descripcion) ?></p>
                        </a>
                    </div>
    
                </article> <!--entrada de blog-->
            <?php endforeach; ?>
        </section>

        <section class="testimoniales" data-cy="testimoniales">
                <h3>Testimoniales</h3>

                <div class="testimonial">
                    <blockquote>
                        El personal se comportó de una exelente forma, muy buena atención y la casa que me ofrecieron cumplieron todas mis expectativas.
                    </blockquote>
                    <p>--Agustinesco</p>
                </div>
        </section>


    </div>