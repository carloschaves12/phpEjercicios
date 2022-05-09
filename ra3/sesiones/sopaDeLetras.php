<?php

session_start();
if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero'] = array();
    $_SESSION['posicionCapitales'] = array();
    $_SESSION['click'] = 1;

    $_SESSION['fInicio'] = 0;
    $_SESSION['cInicio'] = 0;
    $_SESSION['fFinal'] = 0;
    $_SESSION['cFinal'] = 0;
    $_SESSION["acertada"] = array();

    crearTablero();
}

if (isset($_GET['fila'])) {
    if ($_SESSION['click'] == 1) {
        $_SESSION['fInicio'] = $_GET['fila'];
        $_SESSION['cInicio'] = $_GET['columna'];
        $_SESSION['click'] = 2;
    } else if ($_SESSION['click'] == 2) {
        $_SESSION['fFinal'] = $_GET['fila'];
        $_SESSION['cFinal'] = $_GET['columna'];
        if (comprobarPalabra()) {
            array_push($_SESSION["acertada"][], $capital);
        }
        $_SESSION['click'] = 1;
    }

    mostrarTablero();
}

echo ('<a href="cierraSesion.php">Salir</a> <br>');

function comprobarPalabra()
{
    foreach ($_SESSION['posicionCapitales'] as $key => $value) {
        echo $key . "<br>";
        echo $value["filaIni"] . "=>" . $_SESSION['fInicio'] . "<br>";
        echo $value["columnaIni"] . "=>" . $_SESSION['cInicio'] . "<br>";
        echo $value["filaFin"] . "=>" . $_SESSION['fFinal'] . "<br>";
        echo $value["columnaFin"] . "=>" . $_SESSION['cFinal'] . "<br>";
        
        if ($value["columnaIni"] == $_SESSION['cInicio'] && $value["filaIni"] == $_SESSION['fInicio'] && $value["columnaFin"] == $_SESSION['cFinal'] && $value["filaFin"] == $_SESSION['fFinal']) {
            echo "Palabra encontrada";
            return true;
        }
    }

    // foreach ($_SESSION['posicionCapitales'] as $key => $value) {

    //     if ($value["columnaIni"] == $_SESSION['cInicio'] && $value["filaIni"] == $_SESSION['fInicio'] && $value["columnaFin"] == $_SESSION['cFinal'] && $value["filaFin"] == $_SESSION['fFinal']) {
    //         echo "Palabra encontrada";
    //         return true;  
    //     } else {
    //         return false;
    //     }
    // }
}
function mostrarTablero()
{
    foreach ($_SESSION['tablero'] as $key => $value) {
        foreach ($value as $key2 => $value2) {
            echo (' <a href="sopaDeLetras.php?fila=' . $key . '&columna=' . $key2 . '">' . $value2 . '</a> ');
        }
        echo "<br>";
    }

    echo "<br>";
    echo "<h2>Capitales acertadas</h2>";
    //print_r($_SESSION["acertada"]);

    //echo $_SESSION['click'] . "<br>" . $_SESSION['fInicio'] . "<br>" . $_SESSION['cInicio'] . "<br>" . $_SESSION['fFinal'] . "<br>" . $_SESSION['cFinal'];
    //echo "<br>";
    // print_r($_SESSION['posicionCapitales']);

}
function crearTablero()
{
    $aCapitales = array(
        'madrid',
        'paris',
        'roma',
        'berlin',
        'lisboa',
    );

    $direcciones = array("N", "S", "E", "O", "D1O", "D2O", "D1E", "D2E");
    define("TAMANIO", 9);
    $valido = true;
    $caracterCapital = array();

    for ($i = 0; $i <= TAMANIO; $i++) {
        $_SESSION['tablero'][$i] = array();
        for ($j = 0; $j <= TAMANIO; $j++) {
            $_SESSION['tablero'][$i][$j] = '*';
        }
    }

    foreach ($aCapitales as $key => $value) {
        $capital = $value;
        $longitud = strlen($capital);

        for ($i = 0; $i < strlen($capital); $i++) {
            $caracterCapital[$i] = substr($capital, $i, 1);
        }

        do {
            $xInicial = rand(0, TAMANIO);
            $yInicial = rand(0, TAMANIO);
            $direccion = $direcciones[rand(0, count($direcciones) - 1)];
            $xFinal = 0;
            $yFinal = 0;
            $incrementoX = 0;
            $incrementoY = 0;

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

            if ($xFinal >= 0 && $xFinal <= TAMANIO && $yFinal >= 0 && $yFinal <= TAMANIO) {
                $valido = true;
                $n = 0;
                $x = $xInicial;
                $y = $yInicial;
                do {
                    if ($_SESSION['tablero'][$y][$x] == '*' or $_SESSION['tablero'][$y][$x] == $caracterCapital[$n]) {
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
            $_SESSION['posicionCapitales'][$capital] = array("columnaIni" => $xInicial, "filaIni" => $yInicial, "columnaFin" => $xFinal, "filaFin" => $yFinal);
            $n = 0;
            $x = $xInicial;
            $y = $yInicial;
            do {
                $_SESSION['tablero'][$y][$x] = strtoupper($caracterCapital[$n]);
                $n++;
                $x += $incrementoX;
                $y += $incrementoY;
            } while ($x != $xFinal || $y != $yFinal);
        }
    }

    mostrarTablero();
}
?>

<style>
    a {
        text-decoration: none;
        color: black;
    }
</style>