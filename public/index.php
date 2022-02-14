<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use Controllers\CitaController;
use Controllers\LoginController;
use Controllers\ServicioController;
use MVC\Router;

$router = new Router();

//Iniciar Sesión
$router->get("/",[LoginController::class, "login"]);
$router->post("/",[LoginController::class, "login"]);
$router->get("/logout",[LoginController::class, "logout"]);

//Recuperar Password enviando correo
$router->get("/olvide",[LoginController::class, "olvide"]);
$router->post("/olvide",[LoginController::class, "olvide"]);

//en la página para cambiar la contraseña
$router->get("/recuperar",[LoginController::class, "recuperar"]);
$router->post("/recuperar",[LoginController::class, "recuperar"]);

//crear las cuentas
$router->get("/crear_cuenta",[LoginController::class, "crear"]);
$router->post("/crear_cuenta",[LoginController::class, "crear"]);

//confirmar la cuenta
$router->get("/confirmar_cuenta",[LoginController::class, "confirmar"]);
$router->get("/mensaje",[LoginController::class, "mensajeC"]);

//area privada ya iniciando sesión
$router->get("/cita",[CitaController::class, "index"]);
$router->get("/admin",[AdminController::class, "indexAdmin"]);

//API de Citas
$router->get("/api/servicios",[APIController::class, "indexAPI"]);
$router->post("/api/citas",[APIController::class, "guardarCita"]);
$router->post("/api/eliminar",[APIController::class, "eliminarCita"]);

//CRUD de servicios
$router->get("/servicios",[ServicioController::class, "indexCRUD"]);
$router->get("/servicios/crear",[ServicioController::class, "crearServicios"]);
$router->post("/servicios/crear",[ServicioController::class, "crearServicios"]);
$router->get("/servicios/actualizar",[ServicioController::class, "actualizarServicios"]);
$router->post("/servicios/actualizar",[ServicioController::class, "actualizarServicios"]);
$router->post("/servicios/eliminar",[ServicioController::class, "eliminarServicios"]);





// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();