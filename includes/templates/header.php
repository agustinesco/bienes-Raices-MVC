<?php 

    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

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
                    <nav class="navegacion">
                        
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth){ ?>
                            <a href="../../cerrar-sesion.php">cerrar sesión</a>
                        <?php } else{  ?>
                            <a href="login.php">log in</a>
                        <?php } ?>
                    </nav>
                    
                </div>


            </div> <!-- barra -->

            <?php 
                if($inicio){
                    echo "<h1>Venta de Casas y Departamentos de Lujo</h1>";
                }
            ?>
        </div>
    </header>