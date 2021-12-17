<?php

namespace Model;

class Vendedor extends ActiveRecord{
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];
    protected static $tabla = 'vendedores';

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? "";
        $this->apellido = $args['apellido'] ?? "";
        $this->telefono = $args['telefono'] ?? "";
    }
    //Validacion
    public function comprobarErrores()
    {
        $exprecionTelefono = "/[0-9]{10}/";
        
        if(!$this->nombre){
            self::$errores[]= 'El nombre es obligatorio';
        }
        if(!$this->apellido){
            self::$errores[]= 'El apellido es obligatorio';
        }
        if(!$this->telefono){
            self::$errores[]= 'El telefono es obligatorio';
        }
        if(!preg_match($exprecionTelefono , $this->telefono)){
            self::$errores[]= 'El telefono es invalido';
        }
        return self::$errores;
    }
}