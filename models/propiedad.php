<?php 

namespace Model;

class Propiedad extends ActiveRecord{
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];
    protected static $tabla = 'propiedades';

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? "";
        $this->precio = $args['precio'] ?? "";
        $this->imagen = $args['imagen'] ?? "";
        $this->descripcion = $args['descripcion'] ?? "";
        $this->habitaciones = $args['habitaciones'] ?? "";
        $this->wc = $args['wc'] ?? "";
        $this->estacionamiento = $args['estacionamiento'] ?? "";
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? "";
    }

     //Validacion
     public function comprobarErrores()
     {
         if(!$this->titulo){
             self::$errores[] = "Debes añadir un titulo";
         }
         if(!$this->precio){
             self::$errores[] = "El precio es obligatorio";
         }
         if(strlen($this->descripcion) <50){
              $errores[] = "Detalla mas la propiedad";
         }
         if(!$this->habitaciones){
             self::$errores[] = "Tiene que haber habitaciones";
         }
         if(!$this->wc){
             self::$errores[] = "Cuantos wc?";
         }
         if(!$this->estacionamiento){
             self::$errores[] = "Cantidad de estacionamientos?";
         }
         if(!$this->vendedorId){
             self::$errores[]= "seleccione un vendedor";
         }
         if(!$this->imagen){
             self::$errores[] = "La imagen es obligatoria";
         } 
         return self::$errores;
     }
}







