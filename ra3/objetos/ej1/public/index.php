<?php

require_once('..\vendor\autoload.php');
use App\models\Capital;

$capital1 = new Capital('Madrid', 0, 1);
$capital2 = new Capital('Barcelona', 1, 2);

echo $capital1->nombreCapital() . '<br>';
echo $capital1->posicionIni() . '<br>';
echo $capital1->posicionFin() . '<br>';

echo '<br> <br>';

echo $capital2->nombreCapital() . '<br>';
echo $capital2->posicionIni() . '<br>';
echo $capital2->posicionFin() . '<br>';
