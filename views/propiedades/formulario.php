<fieldset>
    <legend>Información general</legend>

    <label for="titulo"> titulo </label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo personalizado" value="<?php echo sanitizarHTML( $propiedad->titulo); ?>"> 

    <label for="precio"> precio </label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de la propieadad" value="<?php echo sanitizarHTML( $propiedad->precio); ?>">  

    <label for="Imagen"> Imagen </label>
    <input type="file" id="Imagen" name="propiedad[imagen]" accept="image/jpeg , image/png">  
    <?php   if($propiedad->imagen):    ?>  
        <img src="/imagenes/<?php echo $propiedad->imagen?>" alt="Imagen de la propiedad" class="imagen-miniatura">
    <?php    endif;    ?>

    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion]" ><?php echo sanitizarHTML($propiedad->descripcion); ?></textarea>

</fieldset>
        

<fieldset>
    <legend>Información propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Cantidad de habiaciones" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->habitaciones); ?>"> 

    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Cantidad de baños" min="1" max="9" value="<?php echo sanitizarHTML( $propiedad->wc); ?>"> 

    <label for="estacionamiento">estacionamiento</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Cantidad de estacionamiento" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->estacionamiento); ?>"> 


</fieldset>


<fieldset>
    <legend>Vendedor</legend>

    <select name="propiedad[vendedorId]" value="<?php echo sanitizarHTML($propiedad->vendedorId); ?>" id="vendedor"> 

        <option value="" selected disabled>--Selecciones un vendedor--</option>

        <?php foreach($vendedores as $vendedor): ?>
                <option 
                <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''  ?>
                value="<?php echo sanitizarHTML( $vendedor->id)?>"> <?php echo sanitizarHTML($vendedor->nombre) . " " . sanitizarHTML($vendedor->apellido) ?></option>
        <?php endforeach; ?>
    
    </select>
</fieldset>