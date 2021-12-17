<?php

namespace Controllers;

use MVC\Router;
use Model\Entrada;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){
        $propiedades = Propiedad::getN(3);
        $entradas = Entrada::getN(2);
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'entradas' => $entradas,
            'inicio' => true,

        ]);
    }
    public static function nosotros(Router $router){
        $router-> render('paginas/nosotros',[]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::getAll();

        $router->render('paginas/propiedades',[
            'propiedades'=>$propiedades,

        ]);
    }
    public static function propiedad(Router $router){
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad,

        ]);
    }
    public static function blog(Router $router){
        $entradas = Entrada::getAll();
        $router->render('paginas/blog',[
            'entradas' => $entradas
        ]);
    }
    public static function entrada(Router $router){
        $id = validarORedireccionar('/blog');
        $entrada = Entrada::find($id);
        $router->render('paginas/entrada',[
            'entrada' => $entrada,

        ]);
    }
    public static function contacto(Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            

            $respuestas = $_POST['contacto'];
            // crear una instancia de phpmailer
            $mail = new PHPMailer();
            
            // Configurar SMTP (simple mail translate protocol)
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 465;
            $mail->Username = '26ac97a2c1d1af';
            $mail->Password = '9eb2a7626f01c5';
            $mail->SMTPSecure = 'tsl';
            
            //configurar el contenido del mail
            $mail->setFrom('from@example.com'); //quien envia el email
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');     //a quien se envia el email
            $mail->Subject = 'Mensaje de contacto bienes raices';

            //habilitar hmp
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail-> CharSet = 'UTF-8';

            //Definir el contenido del mensaje
            $contenido = '<html>';
            $contenido .= '<p>Tiene un nuevo mensaje <b> maestro </b></p>';
            $contenido .= '<p>remitente: '. $respuestas['nombre'] .'</p>';

            //metodo de contacto
            $contenido.= '<p>Metodo de contacto: '. $respuestas['contacto'] .'</p>';
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p> fecha de contacto'.$respuestas['fecha'].'</p>';
                $contenido .= '<p> hora de contacto'.$respuestas['hora'].'</p>';
            } else {
                $contenido .= '<p>correo del remitente: '.$respuestas['email'].'</p>';
            }

            //contenido del mensaje
            $contenido .= '<p>mensaje: '. $respuestas['mensaje'] .'</p>';
            $contenido .= '<p>Accion: '. $respuestas['tipo'] .'</p>';
            if($respuestas['tipo']=== 'compra')  $contenido .= '<p>Presupuesto: $'. $respuestas['precio'] .'</p>';
            else    $contenido .= '<p>Precio: $'. $respuestas['precio'] .'</p>';

            $contenido .='</html>';

            
            $mail->Body    = $contenido;
            $mail->AltBody = 'estp es texto alternativo sin html'; //es para cuando el lector no soporta html

            //enviar el email
            if($mail->send()) $mensaje = 'mensaje enviado';
            else $mensaje = "mensaje enviadon't";
        }

        $router-> render('paginas/contacto',[
            'mensaje' => $mensaje,
            
        ]);
    }

}



