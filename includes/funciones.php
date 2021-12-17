<?php 


define('TEMPLATES_URL' , __DIR__.'/templates');
define('FUNCIONES_URL' , __DIR__.'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT']. '/imagenes/');

function incluirTemplate(string $nombre ,bool $inicio = false){
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAtutenticado() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'];

    if($auth) return true;
    return false;
}

function debugear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}
//Escapa el html
function sanitizarHTML($html){
    return htmlspecialchars($html);
}

function validarTipoContenido($tipo){
    $tipos = ['vendedor','propiedad', 'entrada'];

    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            
            break;

        default:
            break;
    }
    return $mensaje;
}

function validarORedireccionar(String $url){
    $id = filter_var($_GET['id'] , FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: ${url}');
    }
    return $id;
}

?>