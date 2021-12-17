<main class="contenedor seccion">
    <h1 data-cy="heading-login">Iniciar sesión</h1>

    <?php  foreach($errores as $error):  ?>

        <div class="alerta error" data-cy="alertas-login"><?php echo  $error;?></div>

    <?php  endforeach;  ?>

    <form class="formulario" method="POST" action="/login" data-cy="formulario-login">
    <fieldset>
            <legend>Email y Password</legend>
            <label for="email">Correo electronico</label>
            <input data-cy="input-login-email" type="email" name="email" id="email" placeholder="Correo electronico" value="<?php echo sanitizarHTML($auth->email) ?>">

            <label for="Password">Contraseña</label>
            <input data-cy="input-login-password" type="password" name="password" id="Password" placeholder="Tu contraseña">

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

        </fieldset>
    </form>
</main>