<main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        
        <?php 
            if($resultado){
                $mensaje = mostrarNotificacion($resultado);
                if($mensaje){ ?>
                    <p class="alerta exito"> <?php echo sanitizarHTML($mensaje) ?></p>
                <?php } 
            }
        ?>  
        <a href="/propiedades/crear" class="boton boton-verde">Crear nueva propiedad</a>
        <a href="/vendedores/crear" class="boton boton-amarillo">Agregar Vendedor</a>
        <a href="/entradas/crear" class="boton boton-amarillo">Agregar Entrada</a>

        <a href="../index.php" class="boton boton-verde">volver a inicio</a>

        <h2>Propiedades</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>titulo</th>
                    <th>imagen</th>
                    <th>precio</th>
                    <th>acciones</th>
                </tr>
            </thead>

            <tbody> 

                <!-- mostrar resultados -->
                <?php //while( $propiedad = mysqli_fetch_assoc($resultado)): // fetch assoc va a ir pasandole cada row de "resultado" a propiedades hasta quedarse sin
                foreach ($propiedades as $propiedad):
                ?>
                <tr>
                    <td> <?php echo $propiedad->id ?> </td>
                    <td> <?php echo $propiedad->titulo ?> </td>
                    <td><img class="imagen-tabla" src=<?php echo "/imagenes/".$propiedad->imagen ?> alt="imagen tabla"></td>
                    <td>$ <?php echo $propiedad->precio ?></td>
                    <td>
                        <form method="POST" class="w100" action="/propiedades/eliminar">

                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id?>">
                            <input class="boton-rojo-block w100" type="submit" value="Eliminar">
                        </form>
                        <a href="propiedades/actualizar?id=<?php echo $propiedad->id ?>" class="boton-amarillo-block">actualizar</a>
                    </td>         
                </tr>
                <?php endforeach; ?>
            
            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> 

                <!-- mostrar resultados -->
                <?php foreach ($vendedores as $vendedor):?>
                <tr>
                    <td> <?php echo $vendedor->id ?> </td>
                    <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido ?> </td>
                    <td> <?php echo $vendedor->telefono ?></td>   
                    <td>
                        <a href="/vendedores/actualizar?id=<?php echo $vendedor->id ?>" class="boton-amarillo w100">actualizar</a>
                        <form method="POST" class="w100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input class="boton-rojo w100" type="submit" value="Eliminar">
                        </form>
                    </td>   
                </tr>
                <?php endforeach; ?>
            
            </tbody>
        </table>

        <h2>Entradas</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>titulo</th>
                    <th>autor</th>
                    <th>imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> 

                <!-- mostrar resultados -->
                <?php foreach ($entradas as $entrada):?>
                <tr>
                    <td> <?php echo $entrada->id ?> </td>
                    <td> <?php echo $entrada->titulo?></td>
                    <td> <?php echo $entrada->autor ?></td>   
                    <td><img class="imagen-tabla" src=<?php echo "/imagenes/".$entrada->imagen ?> alt="imagen tabla"></td>
                    <td>
                        <a href="/entradas/actualizar?id=<?php echo $entrada->id ?>" class="boton-amarillo w100">actualizar</a>
                        <form method="POST" class="w100" action="/entradas/eliminar">
                            <input type="hidden" name="id" value="<?php echo $entrada->id?>">
                            <input type="hidden" name="tipo" value="entrada">
                            <input class="boton-rojo w100" type="submit" value="Eliminar">
                        </form>
                    </td>   
                </tr>
                <?php endforeach; ?>
            
            </tbody>
        </table>
</main>