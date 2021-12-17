<?php

namespace Controllers;
use MVC\Router;
use Model\admin;

class LoginController {
    public static function login($router){
        $auth = new admin();
        $errores = admin::getErrores(); 

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new admin($_POST);
           
            $errores = $auth->validar();
            if(empty($errores)){
                //verficar si el usuario existe
                $resultado=$auth->existeUsuario();
                if(!$resultado->num_rows) {
                    $errores = admin::getErrores();
                }
                else{
                    // Verificar el pasword
                    $autenticado = $auth->comprobarPassword($resultado);
                    if($autenticado){
                    // Autenticar el usuario
                        $auth->autenticarUsuario();
                    }
                    //password incorrecto
                    else $errores = admin::getErrores();
                }

            }
        }

        $router -> render('auth/login' , [
            'errores' => $errores,
            'auth' => $auth
        ]);
    }
    public static function logout(){
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}

