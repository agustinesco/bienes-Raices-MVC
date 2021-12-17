<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Entrada;

class PropiedadController{
    public static function index(Router $router){
        $propiedades = Propiedad::getAll();
        $vendedores = Vendedor::getAll();
        $entradas = Entrada::getAll();
        $resultado = $_GET['mensaje'] ?? null;

        $router->render('admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores,
            'entradas' => $entradas
        ]);
    }
    public static function crear(Router $router){
        $propiedad = new Propiedad();
        $vendedores = Vendedor::getAll();
        $errores = Propiedad::getErrores();
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $propiedad = new Propiedad($_POST['propiedad']);

           /** SUBIDA DE ARVCHIVOS */
   
           // Crear carpeta
           if(!is_dir(CARPETA_IMAGENES)){
           mkdir(CARPETA_IMAGENES);
           }
   
           // Generar un nombre unico
   
           $nombreImagen = md5(uniqid( rand() , true)). ".jpg";
   
           //Realiza un rezise a la imagen con intervention
           if($_FILES){
               $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen']) -> fit(800,600);
               $propiedad->setImage($nombreImagen);
           }
           
           //validar
           $errores = $propiedad->comprobarErrores();
   
           //revisar que no haya errores
           if(empty($errores)){
               //crear la carpeta
                if(!is_dir(CARPETA_IMAGENES)){
                   mkdir(CARPETA_IMAGENES);
                }
   
               //guardar imagen en el servidor
               $imagen-> save(CARPETA_IMAGENES . $nombreImagen);
   
               $propiedad->guardar(); 
           }
       }

        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');

        $vendedores = Vendedor::getAll();
        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $args = $_POST['propiedad'];
        
            $propiedad->sincronizar($args);

            $errores = $propiedad->comprobarErrores();

            /** SUBIDA DE ARVCHIVOS */

            // Generar un nombre unico
            $nombreImagen = md5(uniqid( rand() , true)). ".jpg";

            //Realiza un rezise a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen']) -> fit(800,600);
                $propiedad->setImage($nombreImagen);
            }

            //revisar que no haya errores
            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen'])
                    $imagen->save(CARPETA_IMAGENES. $nombreImagen);

                $propiedad->guardar();
            }
        }

        $router-> render('/propiedades/actualizar',[
            'vendedores' => $vendedores,
            'propiedad' => $propiedad,
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
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }  
            }
        }
    }
}
