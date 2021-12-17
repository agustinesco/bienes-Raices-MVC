
<div class="contenedor-anuncios" data-cy="contenedor-anuncios">
    <?php foreach( $propiedades as $propiedad): ?>
            <div class="anuncio" data-cy="anuncio">
                <img class ="anuncio-imagen" loading="lazy" src="../../imagenes/<?php echo $propiedad->imagen ?>" alt="img anuncio">
                <div class="contenido-anuncio">
                    
                    <h3><?php echo $propiedad->titulo; ?></h3>
                    <p><?php echo $propiedad->descripcion; ?></p>
                    
                    
                    <p class="precio">$ <?php echo $propiedad->precio; ?></p>

                    <ul class="iconos">
                        <li>
                            <img class="icono-anuncios" src="build/img/icono_wc.svg" alt="inodoro" loading="lazy"> 
                            <p><?php echo $propiedad->wc; ?></p>
                        </li>
                        <li>
                            <img class="icono-anuncios" src="build/img/icono_estacionamiento.svg" alt="coche" loading="lazy"> 
                            <p><?php echo $propiedad->estacionamiento; ?></p>
                        </li>
                        <li>
                            <img class="icono-anuncios" src="build/img/icono_dormitorio.svg" alt="cama" loading="lazy">
                            <p><?php echo $propiedad->habitaciones; ?></p> 
                        </li>
                    </ul>
                    <a href="propiedad?id=<?php echo $propiedad->id ?>" class="boton boton-amarillo-block" data-cy="enlace-propiedad">Ver Propiedad</a>
                    

                </div><!--Contenido anuncio-->
            </div><!--Anuncio-->
    <?php endforeach; ?>
</div> <!--Contenedor de anuncios-->
