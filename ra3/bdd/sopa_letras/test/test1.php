<?php

require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Palabra;

$palabra = Palabra::getInstancia();

$datos = array (
    "palabra"=>"roma"
);

$palabra->set($datos);

$datos2 = array (
    "id"=>2
);

$palabra->get($datos2);

$datos3 = array (
    "id"=>2
);

$palabra->delete($datos3);

$datos4 = array (
    "palabra"=>"madrid",
    "id"=>3
);
$palabra->edit($datos4);