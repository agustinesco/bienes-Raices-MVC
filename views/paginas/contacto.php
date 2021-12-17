
    <main class="contenedor seccion">
        <h1 data-cy="heading-contacto">Contacto</h1>

        <?php if($mensaje): ?>
                <p class='alerta exito' data-cy="alerta-envio"><?php echo $mensaje ?></p>
        <?php endif ?>

        <picture>
            <source srcset='build/img/destacada3.webp' type='image/webp'>
            <source srcset='build/img/destacada3.jpg' type='image/jpeg'>
            <img loading='lazy' src='build/img/destacada3.jpg' alt='imagen de contacto'>
        </picture>

        <h2 data-cy="heading-formulario">Llene el Formulario de Contacto</h2>

        <form class="formulario" action="/contacto" method="POST" data-cy="formulario">

            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">nombre</label>
                <input data-cy="input-nombre" type="text"  name="contacto[nombre]" id="nombre" placeholder="Tú nombre" >

                <label for="mensaje">Mensaje</label>
                <textarea data-cy="input-mensaje" name="contacto[mensaje]" id="mensaje" ></textarea>

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="vende-o-compra">Vende o compra: </label>
                <select  name="contacto[tipo]" id="vende-o-compra" data-cy="input-opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>
                <label for="presupuesto">Tu precio o presupuesto</label>
                <input data-cy="dinero" type="number"  name="contacto[precio]" id="presupuesto" placeholder="Precio o Presupuesto" >

            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <label>Como desea ser contactado</label>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input data-cy="forma-contacto" type="radio" value="telefono" name="contacto[contacto]" id="contactar-telefono" >

                    <label for="contactar-email">Email</label>
                    <input data-cy="forma-contacto" type="radio" value="email" name="contacto[contacto]" id="contactar-email" > <!--se asocian por el name y el type radio solo permite una de las opciones-->
                </div>

                <div id="contacto"></div>

            </fieldset>

            <input data-cy="submit" type="submit" value="enviar" class="boton-verde">
        </form>



    </main>