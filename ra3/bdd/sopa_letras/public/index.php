<?php

require '../vendor/autoload.php';
require '../app/Config/constantes.php';

use App\Core\Router;
use App\Controllers\DefaultController;

session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = array(
        'usuario' => 'invitado',
        'perfil' => 'invitado'
    );
}

$router = new Router();

$router->add(array(
    'name'=>'index',
    'path'=>'/palabra/',
    'action'=>[DefaultController::class, 'palabraAction'],
    'auth'=>["admin", "usuario", "invitado"]
));

$router->add(array(
    'name'=>'addPalabra',
    'path'=>'/palabra\/add/',
    'action'=>[DefaultController::class, 'annadirPalabraAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'delPalabra',
    'path'=>'/palabra\/del\/\d{1,3}/',
    'action'=>[DefaultController::class, 'borrarPalabraAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'editPalabra',
    'path'=>'/palabra\/edit\/\d{1,3}\/\w{1,}/',
    'action'=>[DefaultController::class, 'editarPalabraAction'],
    'auth'=>["admin"]

));

$router->add(array(
    'name'=>'loginPalabra',
    'path'=>'/palabra\/login/',
    'action'=>[DefaultController::class, 'loginPalabraAction'],
    'auth'=>["admin", "usuario", "invitado"]
));

$router->add(array(
    'name'=>'cerrarPalabra',
    'path'=>'/palabra\/cierra_sesion/',
    'action'=>[DefaultController::class, 'cerrarSesionPalabraAction'],
    'auth'=>["admin", "usuario"]
));

$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if($route && in_array($_SESSION['usuario']['perfil'], $route['auth'])) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);

} else {
    echo "No route matched";
}