<?php

namespace Model;

use DateTime;

class Entrada extends ActiveRecord{
    protected static $columnasDB = ['id', 'titulo', 'imagen', 'creado', 'autor', 'contenido', 'descripcion'];
    protected static $tabla = 'blog';

    public $id;
    public $titulo;
    public $imagen;
    public $creado;
    public $autor;
    public $descripcion;
    public $contenido;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? "";
        $this->imagen = $args['imagen'] ?? null;
        $this->creado = date('Y/m/d');
        $this->autor = $args['autor'] ?? "";
        $this->contenido = $args['contenido'] ?? "";
        $this->descripcion = $args['descripcion'] ?? "";
    }
    //Validacion
    public function comprobarErrores()
    {
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }
        if(strlen($this->contenido) <50){
            $errores[] = "Escribe la entrada al blog";
        }
        if(strlen($this->descripcion) >50){
            $errores[] = "la descripcion es muy larga!";
        }
        if(!$this->imagen){
            self::$errores[] = "La imagen es obligatoria";
        } 
        if(!$this->autor){
            self::$errores[] = "Quien es el autor?";
        } 
        return self::$errores;
    }
}


