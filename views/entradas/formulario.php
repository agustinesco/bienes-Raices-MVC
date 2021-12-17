<fieldset>
    <legend>Información general</legend>

    <label for="titulo"> titulo </label>
    <input type="text" id="titulo" name="entrada[titulo]" placeholder="Titulo personalizado" value="<?php echo sanitizarHTML( $entrada->titulo); ?>"> 

    <label for="Imagen"> Imagen </label>
    <input type="file" id="Imagen" name="entrada[imagen]" accept="image/jpeg , image/png">  
    <?php   if($entrada->imagen):    ?>  
        <img src="/imagenes/<?php echo $entrada->imagen?>" alt="Imagen de la entrada" class="imagen-miniatura">
    <?php    endif;    ?>

    <label for="autor"> Autor </label>
    <input type="text" id="autor" name="entrada[autor]" placeholder="autor de la entrada" value="<?php echo sanitizarHTML( $entrada->autor); ?>"> 

    <label for="contenido">contenido</label>
    <textarea id="contenido" name="entrada[contenido]" ><?php echo sanitizarHTML($entrada->contenido); ?></textarea>

    <label for="descripcion">descripcion</label>
    <textarea id="descripcion" name="entrada[descripcion]" ><?php echo sanitizarHTML($entrada->descripcion); ?></textarea>

</fieldset>