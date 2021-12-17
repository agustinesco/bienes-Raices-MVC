<fieldset>
    <legend>Información Sobre el Vendedor(a)</legend>

    <label for="nombre"> Nombre: </label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedor(a)" value="<?php echo sanitizarHTML( $vendedor->nombre); ?>"> 

    <label for="apellido"> Apellido: </label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido Vendedor(a)" value="<?php echo sanitizarHTML( $vendedor->apellido); ?>"> 

    <label for="telefono"> Teléfono: </label>
    <input type="tel" id="telefono" name="vendedor[telefono]" placeholder="Telefono Vendedor(a)" value="<?php echo sanitizarHTML( $vendedor->telefono); ?>"> 

</fieldset>