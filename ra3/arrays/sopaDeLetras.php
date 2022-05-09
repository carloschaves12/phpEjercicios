<?php
$aCapitales = array(
    'madrid',
    'paris',
    'roma',
    'berlin',
    'lisboa',
    // 'londres',
    // 'estocolmo',
    // 'oslo',
    // 'copenhague',
    // 'helsinki'
);

$direcciones = array("N", "S", "E", "O", "D1O", "D2O", "D1E", "D2E");
$TAMANIO = 9;
$valido = true;
$aTablero = array();
// $capital = $aCapitales[rand(0, count($aCapitales) - 1)];
// $longitud = strlen($capital);
$caracterCapital = array();

for ($i = 0; $i <= $TAMANIO; $i++) {
    $aTablero[$i] = array();
    for ($j = 0; $j <= $TAMANIO; $j++) {
        $aTablero[$i][$j] = '*';
    }
}

foreach ($aCapitales as $key => $value) {
    $capital = $value;
    $longitud = strlen($capital);

    for ($i = 0; $i < strlen($capital); $i++) {
        $caracterCapital[$i] = substr($capital, $i, 1);
    }

    do {
        $xInicial = rand(0, $TAMANIO);
        $yInicial = rand(0, $TAMANIO);
        $direccion = $direcciones[rand(0, count($direcciones) - 1)];
        $xFinal;
        $yFinal;
        $incrementoX;
        $incrementoY;

        switch ($direccion) {
            case 'N':
                $xFinal = $xInicial;
                $yFinal = $yInicial - $longitud;
                $incrementoX = 0;
                $incrementoY = -1;
                break;

            case "S":
                $xFinal = $xInicial;
                $yFinal = $yInicial + $longitud;
                $incrementoX = 0;
                $incrementoY = +1;
                break;

            case 'E':
                $xFinal = $xInicial + $longitud;
                $yFinal = $yInicial;
                $incrementoX = +1;
                $incrementoY = 0;
                break;

            case "O":
                $xFinal = $xInicial - $longitud;
                $yFinal = $yInicial;
                $incrementoX = -1;
                $incrementoY = 0;
                break;

            case "D1O":
                $xFinal = $xInicial - $longitud;
                $yFinal = $yInicial - $longitud;
                $incrementoX = -1;
                $incrementoY = -1;
                break;

            case "D2O":
                $xFinal = $xInicial - $longitud;
                $yFinal = $yInicial + $longitud;
                $incrementoX = -1;
                $incrementoY = +1;
                break;

            case "D1E":
                $xFinal = $xInicial + $longitud;
                $yFinal = $yInicial - $longitud;
                $incrementoX = +1;
                $incrementoY = -1;
                break;

            case "D2E":
                $xFinal = $xInicial + $longitud;
                $yFinal = $yInicial + $longitud;
                $incrementoX = +1;
                $incrementoY = +1;
                break;
        }

        if ($xFinal >= 0 && $xFinal <= $TAMANIO && $yFinal >= 0 && $yFinal <= $TAMANIO) {
            $valido = true;
            $n = 0;
            $x = $xInicial;
            $y = $yInicial;
            do {
                if ($aTablero[$y][$x] == '*' or $aTablero[$y][$x] == $caracterCapital[$n]) {
                    $n++;
                    $valido = true;
                } else {
                    $valido = false;
                    break;
                }
                $x += $incrementoX;
                $y += $incrementoY;
            } while ($x != $xFinal || $y != $yFinal);
        } else {
            $valido = false;
        }
    } while (!$valido);

    if ($valido) {
        $n = 0;
        $x = $xInicial;
        $y = $yInicial;
        do {
            $aTablero[$y][$x] = strtoupper($caracterCapital[$n]);
            $n++;
            $x += $incrementoX;
            $y += $incrementoY;
        } while ($x != $xFinal || $y != $yFinal);
    }
}

foreach ($aTablero as $key => $value) {
    foreach ($value as $key2 => $value2) {
        echo " " . $value2 . " ";
    }
    echo "<br>";
}
