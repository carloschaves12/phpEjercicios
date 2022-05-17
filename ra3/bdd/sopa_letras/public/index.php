<?php

require '../vendor/autoload.php';
use App\Controllers\DefaultController;

$ruta = explode("index.php" ,$_SERVER['REQUEST_URI']);
$controlador = new DefaultController();

if ($ruta[1] == "/palabra") {
    $controlador->palabraAction();
} else if ($ruta[1] == "/palabra/add") {
    $controlador->annadirPalabraAction();
} else if (explode("/", $ruta[1])[1] == "palabra" && explode("/", $ruta[1])[2] == "del" && preg_match("/\d{1,}/", explode("/", $ruta[1])[3]) == 1) {
    $controlador->borrarPalabraAction(explode("/", $ruta[1])[3]);
} else if (explode("/", $ruta[1])[1] == "palabra" && explode("/", $ruta[1])[2] == "edit" && preg_match("/\d{1,}/", explode("/", $ruta[1])[3]) == 1 && preg_match("/\w{1,}/", explode("/", $ruta[1])[4]) == 1) {
    $controlador->editarPalabraAction(explode("/", $ruta[1])[3], explode("/", $ruta[1])[4]);
} else {
    echo "Not found";
}