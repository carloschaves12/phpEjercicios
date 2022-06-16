<?php

require '../vendor/autoload.php';
require '../app/Config/constantes.php';

use App\Core\Router;
use App\Controllers\SesionesController;
use App\Controllers\EncuestasController;
use App\Models\Preguntas;
use App\Models\Opciones;

$preguntas = Preguntas::getInstancia();
$preguntas->setId(2);
$data = $preguntas->getById();
print_r($data);
