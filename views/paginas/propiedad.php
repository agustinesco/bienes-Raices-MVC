<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo ?></h1>


        <img src="imagenes/<?php echo $propiedad->imagen ?>" alt="imagen de la propiedad">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad->precio ?></p>

            <ul class="iconos icono-anuncio">
                <li>
                    <img src="build/img/icono_wc.svg" alt="inodoro" loading="lazy" class="icono-anuncios"> 
                    <p><?php echo $propiedad->wc ?></p>
                </li>
                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="coche" loading="lazy" class="icono-anuncios"> 
                    <p><?php echo $propiedad->estacionamiento ?></p>
                </li>
                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="cama" loading="lazy" class="icono-anuncios">
                    <p><?php echo $propiedad->habitaciones ?></p> 
                </li>
            </ul>
    
            <p class="texto"><?php echo $propiedad->descripcion ?>
            </p>


        </div>


    </main>