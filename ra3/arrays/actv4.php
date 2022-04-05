<?php

$listado = $suspensos = $aprobados = $boletin = false;
$maxSuspensos = 0;
$asigSupensa = "";
$maxAprovados = 0;
$asigAprobada = "";


$aNotas = array(
    "DIW" => array(
        "carlos" => array(
            "eval1" => 6,
            "eval2" => 4,
        ),
        "viginia" => array(
            "eval1" => 6,
            "eval2" => 7,
        ),
        "andrea" => array(
            "eval1" => 8,
            "eval2" => 9,
        ),
        "daniel" => array(
            "eval1" => 10,
            "eval2" => 10,
        ),
    ),
    "DEWC" => array(
        "carlos" => array(
            "eval1" => 1,
            "eval2" => 6,
        ),
        "viginia" => array(
            "eval1" => 8,
            "eval2" => 5,
        ),
        "andrea" => array(
            "eval1" => 10,
            "eval2" => 5,
        ),
        "daniel" => array(
            "eval1" => 8,
            "eval2" => 7,
        ),
    ),
    "DWES" => array(
        "carlos" => array(
            "eval1" => 8,
            "eval2" => 4,
        ),
        "viginia" => array(
            "eval1" => 10,
            "eval2" => 7,
        ),
        "andrea" => array(
            "eval1" => 9,
            "eval2" => 6,
        ),
        "daniel" => array(
            "eval1" => 4,
            "eval2" => 7,
        ),
    ),
    "HLC" => array(
        "carlos" => array(
            "eval1" => 0,
            "eval2" => 7,
        ),
        "viginia" => array(
            "eval1" => 8,
            "eval2" => 7,
        ),
        "andrea" => array(
            "eval1" => 2,
            "eval2" => 6,
        ),
        "daniel" => array(
            "eval1" => 5,
            "eval2" => 8,
        ),
    ),
    "EIEM" => array(
        "carlos" => array(
            "eval1" => 6,
            "eval2" => 4,
        ),
        "viginia" => array(
            "eval1" => 6,
            "eval2" => 7,
        ),
        "andrea" => array(
            "eval1" => 7,
            "eval2" => 7,
        ),
        "daniel" => array(
            "eval1" => 3,
            "eval2" => 10,
        ),
    ),
    "DAWEB" => array(
        "carlos" => array(
            "eval1" => 9,
            "eval2" => 7,
        ),
        "viginia" => array(
            "eval1" => 3,
            "eval2" => 5,
        ),
        "andrea" => array(
            "eval1" => 10,
            "eval2" => 6,
        ),
        "daniel" => array(
            "eval1" => 3,
            "eval2" => 7,
        ),
    ),
);

if (isset($_POST['listado'])) {
    $listado = true;
}

if (isset($_POST['aprobados'])) {
    $aprobados = true;
}

if (isset($_POST['suspensos'])) {
    $suspensos = true;
}

if (isset($_POST['boletin'])) {
    $boletin = true;
}

?>

<form action="" method="post">
    <input type="submit" value="listado" name="listado">
    <br>
    <br>
    <input type="submit" value="aprobados" name="aprobados">
    <br>
    <br>
    <input type="submit" value="suspensos" name="suspensos">
    <br>
    <br>
    selecciona la evaluacion <select name="eval">
        <option value="eval1">primera evaluación</option>
        <option value="eval2">segunda evaluación</option>
    </select>
    <input type="submit" value="boletin" name="boletin">
</form>

<style>
    table {
        text-align: center;
        
    }
</style>

<?php
if ($listado) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Asignatura</th>";
    echo "<th>Primera evaluación</th>";
    echo "<th>Segunda evaluación</th>";
    echo "<th>Media</th>";
    echo "</tr>";
    foreach ($aNotas as $asignatura => $alumno) {
        foreach ($alumno as $nombre => $notas) {
            echo "<tr>";
            echo "<td>" . $nombre . "</td>";
            echo "<td>" . $asignatura . "</td>";
            echo "<td>" . $notas["eval1"] . "</td>";
            echo "<td>" . $notas["eval2"] . "</td>";
            $media = ($notas["eval1"] + $notas["eval2"]) / 2;
            echo "<td>" . $media . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
}

if ($suspensos) {
    foreach ($aNotas as $asignatura => $alumno) {
        $numSuspensos = 0;
        $media = 0;
        foreach ($alumno as $nombre => $notas) {
            $media = ($notas["eval1"] + $notas["eval2"]) / 2;
            if ($media < 5) {
                $numSuspensos++;
            }
            if ($suspensos > $maxSuspensos) {
                $maxSuspensos = $numSuspensos;
                $asigSupensa = $asignatura;
            }
        }
    }

    echo "Asignatura con mas suspensos: " . $asigSupensa;
}

if ($aprobados) {
    foreach ($aNotas as $asignatura => $alumno) {
        $numAprovados = 0;
        $media = 0;
        foreach ($alumno as $nombre => $notas) {
            $media = ($notas["eval1"] + $notas["eval2"]) / 2;
            if ($media >= 5) {
                $numAprovados++;
            }
            if ($aprobados > $maxAprovados) {
                $maxAprovados = $numAprovados;
                $asigAprobada = $asignatura;
            }
        }
    }

    echo "Asignatura con mas aprovados: " . $asigAprobada;
}

if ($boletin) {
    echo "<table center>";
    echo "<tr>";
    echo "<th>asignatura</th>";
    foreach ($aNotas["DIW"] as $nombre => $notas) {
        echo "<th>" . $nombre . "</th>";
    }
    echo "</tr>";
    foreach ($aNotas as $asignatura => $nombre) {
        echo "<tr>";
        echo "<td>" . $asignatura . "</td>";
        foreach ($nombre as $nombre => $notas) {
            echo "<td>" . $notas[$_POST["eval"]] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}