<?php 

    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="/build/img/logo.svg" alt="logo de la empresa">
                </a>
                <div class="mobil-menu">
                    <img src="/build/img/barras.svg" alt="hamburguesa">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="boton del dark mode" class="dark-mode-boton">
                    <nav class="navegacion" data-cy="navegacion-header">
                        
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Propiedades</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth){ ?>
                            <a href="/logout">cerrar sesión</a>
                        <?php } else{  ?>
                            <a href="/login">log in</a>
                        <?php } ?>
                    </nav>
                    
                </div>


            </div> <!-- barra -->

            <?php 
                if($inicio){
                    echo "<h1 data-cy='heading-sitio' class='prueba'>Venta de Casas y Departamentos de Lujo</h1>";
                }
            ?>
        </div>
    </header>

    <?php echo $contenido ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion" data-cy="navegacion-footer">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Propiedades</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>

            </nav>

        </div>

        <p class="copyright" data-cy="copyright"> Todos los derechos Reservados 2020 - <?php echo date('Y') ?> © </p>
    </footer>
    <script src="/build/js/bundle.min.js"></script>
</body>
</html>