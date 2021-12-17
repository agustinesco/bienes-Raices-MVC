<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedoresController;
use Controllers\PaginasController;
use Controllers\EntradasController;
use Controllers\LoginController;



$router = new Router();

// Zona de control
$router->get("/admin" , [PropiedadController::class, 'index']);

$router->get("/propiedades/crear" , [PropiedadController::class, 'crear']);
$router->post("/propiedades/crear" , [PropiedadController::class, 'crear']);
$router->get("/propiedades/actualizar" , [PropiedadController::class, 'actualizar']);
$router->post("/propiedades/actualizar" , [PropiedadController::class, 'actualizar']);
$router->post("/propiedades/eliminar" , [PropiedadController::class, 'eliminar']);

$router->get("/vendedores/crear" , [VendedoresController::class, 'crear']);
$router->post("/vendedores/crear" , [VendedoresController::class, 'crear']);
$router->get("/vendedores/actualizar" , [VendedoresController::class, 'actualizar']);
$router->post("/vendedores/actualizar" , [VendedoresController::class, 'actualizar']);
$router->post("/vendedores/eliminar" , [VendedoresController::class, 'eliminar']);

$router->get("/entradas/crear" , [EntradasController::class, 'crear']);
$router->post("/entradas/crear" , [EntradasController::class, 'crear']);
$router->get("/entradas/actualizar" , [EntradasController::class, 'actualizar']);
$router->post("/entradas/actualizar" , [EntradasController::class, 'actualizar']);
$router->post("/entradas/eliminar" , [EntradasController::class, 'eliminar']);

// Zona publica
$router->get("/" ,[PaginasController::class , 'index']);
$router->get("/nosotros" ,[PaginasController::class , 'nosotros']);
$router->get("/propiedades" ,[PaginasController::class , 'propiedades']);
$router->get("/propiedad" ,[PaginasController::class , 'propiedad']);
$router->get("/blog" ,[PaginasController::class , 'blog']);
$router->get("/entrada" ,[PaginasController::class , 'entrada']);
$router->get("/contacto" ,[PaginasController::class , 'contacto']);
$router->post("/contacto" ,[PaginasController::class , 'contacto']);

// Login y autenticacion
$router->get('/login' , [LoginController::class , 'login']);
$router->post('/login' , [LoginController::class , 'login']);
$router->get('/logout' , [LoginController::class , 'logout']);

$router->comprobarRutas();
