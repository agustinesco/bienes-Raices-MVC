<?php 

require "funciones.php";
require "config/database.php";
require __DIR__ . '/../vendor/autoload.php';


//Conectarse a la base de datos
use Model\ActiveRecord;

ActiveRecord::setDB(conectarDB());
