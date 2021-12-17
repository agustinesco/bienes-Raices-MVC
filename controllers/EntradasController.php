<?php

namespace Controllers;

use Model\Entrada;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class EntradasController{
    public static function crear(Router $router){
        $entrada = new Entrada();
        $errores = Entrada::getErrores();

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $entrada = new Entrada($_POST['entrada']);
            /** SUBIDA DE ARVCHIVOS */
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }

            $nombreImagen = md5(uniqid( rand() , true)). ".jpg";
        
            //Realiza un rezise a la imagen con intervention
            if($_FILES['entrada']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['entrada']['tmp_name']['imagen']) -> fit(800,600);
                $entrada->setImage($nombreImagen);
            }

            $errores = $entrada->comprobarErrores();

            if(empty($errores)){
                $imagen->save(CARPETA_IMAGENES.$nombreImagen);

                $entrada->guardar();
            }
        }

        $router-> render('entradas/crear' , [
            'errores' => $errores,
            'entrada' => $entrada
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');
        $entrada = Entrada::find($id);
        $errores = Entrada ::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['entrada'];
            $entrada->sincronizar($args);
            $errores = $entrada->comprobarErrores();

            //Realiza un rezise a la imagen con intervention
            if($_FILES['entrada']['tmp_name']['imagen']){
                // Generar un nombre unico
                $nombreImagen = md5(uniqid( rand() , true)). ".jpg";
                $imagen = Image::make($_FILES['entrada']['tmp_name']['imagen']) -> fit(800,600);
                $entrada->setImage($nombreImagen);
            }

            if(empty($errores)){
                if($_FILES['entrada']['tmp_name']['imagen'])
                    $imagen->save(CARPETA_IMAGENES. $nombreImagen);

                $entrada->guardar();
            }
        }

        $router->render('entradas/actualizar',[
            'entrada' => $entrada,
            'errores' => $errores,

        ]);
    }
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id,FILTER_VALIDATE_INT);
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $entrada = Entrada::find($id);
                    $entrada->eliminar();
                }
            }
        }
    }
}
