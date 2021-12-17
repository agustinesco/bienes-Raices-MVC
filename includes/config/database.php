<?php 


function conectarDB() : mysqli{
      $db = new mysqli('localhost' , 'root' , 'lautaro9', 'bienes_raices');

     if(!$db){
        echo "no se pudo conectar";
        exit;
     }
    return $db;
}


?>