<?php

require '../vendor/autoload.php';
require '../app/Config/constantes.php';

use App\Core\Router;
use App\Controllers\SesionesController;
use App\Controllers\EncuestasController;

session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = array(
        'usuario' => 'invitado',
        'perfil' => 'invitado',
        'id' => ""
    );
}

print_r($_SESSION['usuario']);

$router = new Router();

$router->add(array(
    'name' => 'index',
    'path' => '/^\/encuestas$/',
    'action' => [EncuestasController::class, 'encuestasAction'],
    'auth' => ["admin", "usuario"]
));

$router->add(array(
    'name' => 'loginEncuestas',
    'path' => '/^\/encuestas\/login$/',
    'action' => [SesionesController::class, 'loginEncuestasAction'],
    'auth' => ["admin", "usuario", "invitado"]
));

$router->add(array(
    'name' => 'registrarEncuestas',
    'path' => '/^\/encuestas\/registrar$/',
    'action' => [SesionesController::class, 'registrarEncuestasAction'],
    'auth' => ["admin", "invitado"]
));

$router->add(array(
    'name' => 'cerrarEncuestas',
    'path' => '/^\/encuestas\/cierra_sesion$/',
    'action' => [SesionesController::class, 'cerrarSesionEncuestasAction'],
    'auth' => ["admin", "usuario"]
));

$router->add(array(
    'name' => 'borrarEncuestas',
    'path' => '/^\/encuestas\/del\/\d{1,3}$/',
    'action' => [EncuestasController::class, 'borrarEncuestasAction'],
    'auth' => ["admin"]
));

$router->add(array(
    'name' => 'editarEncuestas',
    'path' => '/^\/encuestas\/edit\/\d{1,3}\/\w{1,}$/',
    'action' => [EncuestasController::class, 'editarEncuestasAction'],
    'auth' => ["admin"]
));

$router->add(array(
    'name' => 'annadirEncuestas',
    'path' => '/^\/encuestas\/add$/',
    'action' => [EncuestasController::class, 'annadirEncuestasAction'],
    'auth' => ["admin"]
));

$router->add(array(
    'name' => 'mostrarEncuestas',
    'path' => '/^\/encuestas\/mostrarEncuesta\/\d{1,3}$/',
    'action' => [EncuestasController::class, 'mostrarEncuestasAction'],
    'auth' => ["admin", "usuario"]
));


$request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    if (in_array($_SESSION["usuario"]["perfil"], $route["auth"])) {
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    } else {
        echo "No tienes permisos para acceder a esta página";
    }
} else {
    echo "No route matched";
}
