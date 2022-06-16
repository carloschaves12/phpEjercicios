<?php

require '../vendor/autoload.php';
require '../app/Config/constantes.php';

use App\Core\Router;
use App\Controllers\DefaultController;

session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = array(
        'usuario' => 'invitado',
        'perfil' => 'invitado',
        'bloqueado' => "",
        'id' => ""
    );
}

$router = new Router();

$router->add(array(
    'name' => 'index',
    'path' => '/bookmarks/',
    'action' => [DefaultController::class, 'bookmarksAction'],
    'auth' => ["admin", "usuario"]
));

$router->add(array(
    'name' => 'loginBookmarks',
    'path' => '/bookmarks\/login/',
    'action' => [DefaultController::class, 'loginBookmarksAction'],
    'auth' => ["admin", "usuario", "invitado"]
));

$router->add(array(
    'name' => 'registrarBookmarks',
    'path' => '/bookmarks\/registrar/',
    'action' => [DefaultController::class, 'registrarBookmarksAction'],
    'auth' => ["admin", "invitado"]
));

$router->add(array(
    'name' => 'cerrarBookmarks',
    'path' => '/bookmarks\/cierra_sesion/',
    'action' => [DefaultController::class, 'cerrarSesionBookmarksAction'],
    'auth' => ["admin", "usuario", "invitado"]
));

$router->add(array(
    'name' => 'borrarBookmarks',
    'path' => '/bookmarks\/del\/\d{1,3}/',
    'action' => [DefaultController::class, 'borrarBookmarksAction'],
    'auth' => ["admin"]
));

$router->add(array(
    'name' => 'editarBookmarks',
    'path' => '/bookmarks\/edit\/\d{1,3}\/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()!@:%_\+.~#?&\/\/=]*)\/\w{1,}/',
    'action' => [DefaultController::class, 'editarBookmarksAction'],
    'auth' => ["admin"]
));

$router->add(array(
    'name' => 'annadirBookmarks',
    'path' => '/bookmarks\/add/',
    'action' => [DefaultController::class, 'annadirBookmarksAction'],
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
