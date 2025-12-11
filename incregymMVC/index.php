<?php
session_start();
if (!isset($_SESSION['empleado'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/config/Database.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/UsuarioController.php';
require_once 'controllers/RutinaController.php';
require_once 'controllers/HorarioController.php';
require_once 'controllers/AforoController.php';
require_once 'controllers/EmpleadoController.php';

$url = $_GET['url'] ?? 'home/index';
$parts = explode('/', $url);

$controllerName = $parts[0] ?? 'home';
$action = $parts[1] ?? 'index';

// =======================================================
//  RESOLVER CONTROLADOR
// =======================================================
switch ($controllerName) {
    case 'empleado':
        $controller = new EmpleadoController();
        break;
    case 'usuarios':
        $controller = new UsuarioController();
        break;

    case 'rutinas':
        $controller = new RutinaController();
        break;

    case 'horario':
        $controller = new HorarioController();
        break;

    case 'aforo':
        $controller = new AforoController();
        break;

    default:
        $controller = new HomeController();
        break;
}

// =======================================================
//  EJECUTAR ACCIÓN — AHORA FUNCIONA CON TODAS LAS RUTAS
// =======================================================
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "<h3>Error: la acción <strong>$action</strong> no existe en el controlador <strong>$controllerName</strong></h3>";
}