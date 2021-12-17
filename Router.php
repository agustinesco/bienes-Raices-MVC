<?php

namespace MVC;

class Router{
    
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $funcion)
    {
        $this->rutasGET[$url] = $funcion;
    }
    public function post($url, $funcion){
        $this->rutasPOST[$url] = $funcion;
    }

    public function comprobarRutas()
    {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        // Arreglo de rutas protegidas
        $rutasProtegidas = ['/admin',"/propiedades/crear", "/propiedades/actualizar", "/propiedades/eliminar", "/vendedores/crear", "/vendedores/actualizar", "/vendedores/eliminar", "/entradas/crear", "/entradas/actualizar", "/entradas/eliminar"];

        $urlActual = $_SERVER['PATH_INFO']?? "/";
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        } elseif ($metodo === 'POST') {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if(in_array($urlActual,$rutasProtegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            //existe la url y tiene una funcion asociada
            call_user_func($fn, $this);
        }else{
            echo "página no encontrada";
        }
    }
    //Mostrar una vista
    public function render($view , $datos = []){

        foreach($datos as $key => $value){
            $$key = $value;
        }

        ob_start(); //inicia un almacenamiento en memoria
        include __DIR__ ."/views/$view.php";
        $contenido = ob_get_clean(); //limpiamos esa memoria y la guardamos en $contenido

        include __DIR__ . "/views/layout.php";

    }
}