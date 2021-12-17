<?php    

namespace Model;

class ActiveRecord{
    // Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Errores 
    protected static $errores = [];



    public static function setDB($database){
        self::$db= $database;
    }

     //subida de archivos
    public function setImage($imagen)
    {
        //eliminar imagen previa si posee
        if(!is_null($this->id)){
            $this->borrarImagen();
        }

        if($imagen){
            $this->imagen = $imagen;
        }
    }
    public function borrarImagen()
    {
        //ver si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

        if($existeArchivo){
            unlink(CARPETA_IMAGENES. $this->imagen);
        }
    }

    public function guardar(){
        if(!is_null($this->id)){
            $this->actualizar();
        }else{
            $this->crear();
        }
    }

    public function actualizar()
    {
        //Sanitizar los datos
        $atributos = $this->sanitisarDatos();

        $valores= [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE ".static::$tabla." SET ";
        $query .= join(', ', $valores);
        $query .= "WHERE id = '" . self::$db->escape_string($this->id). "' ";
        $query .= "LIMIT 1 ";
        
        if(self::$db->query($query)){
                header('Location: /admin?mensaje=2');
        }
    }

    public function crear(){
        //Sanitizar los datos
        $atributos = $this->sanitisarDatos();

       //insertar en la base de datos
       $query = " INSERT INTO ".static::$tabla." ( ";
       $query .= join(', ', array_keys($atributos)) ;
       $query .= " ) VALUES ('";
       $query .= join("', '" , array_values($atributos));
       $query.= " ') ";

       if(self::$db->query($query)){
            header('Location: /admin?mensaje=1');
}
    }
            
    public function eliminar()
    {
         //Elimina la propiedad
         $query = "DELETE FROM ".static::$tabla." WHERE id= " . self::$db->escape_string($this->id) . " LIMIT 1 ";
         $resultado = self::$db->query($query);

         if($resultado){
             $this->borrarImagen();
            header('location: /admin?mensaje=3');
         }
    }
    

    /* identificar y unir los atributos de la BD */
    public function atributos()
    {
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna]= $this->$columna;
        }
        return $atributos;
    }

    public function sanitisarDatos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        
        foreach($atributos as $key=>$value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    //Validacion
    public function comprobarErrores()
    {
        static::$errores = [];
        return static::$errores;
    }


    static function getErrores()
    {
        return static::$errores;
    }

    // Lista todos los registros
    public static function getAll()
    {
        $query = "SELECT * FROM ". static::$tabla;
        
        return static::consultarSQL($query);

    }

    // obtiene determinado numero de registros
    public static function getN($n)
    {
        $query = "SELECT * FROM ". static::$tabla . " LIMIT ". $n;

        return static::consultarSQL($query);
    }

    // obtiene el elemento con el id pasado por parametro
    public static function find($id){
        $query = "SELECT * FROM ".static::$tabla." WHERE id = ${id}";
        
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        // Consultar db
        $consulta = static::$db->query($query);

        // Iterar los resultados
        $arreglo = [];

        while($registro = $consulta->fetch_assoc()){
            
            $arreglo[] = static::crearObjeto($registro);
        }
        
        // liberar la memoria
        $consulta->free();

        //retornar los resultados
        return $arreglo;
    }
   
    public static function crearObjeto($registro)
    {
        $objeto = new static;
        
        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar($args = [])
    {
        foreach($args as $key => $value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }






}

