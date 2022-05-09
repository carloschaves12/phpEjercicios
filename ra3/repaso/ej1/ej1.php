<?php
include "config/tests_cnf.php";

if (!isset($_COOKIE["ultimoTest"])) {
    ?>
    <h1>Test autoescuela</h1>
    <p>seleccione el test:</p>
    <form method="post">
        <select name="nombre">
        <?php
        foreach ($aTests as $key => $value) {
            echo "<option value='" . $value["idTest"]. "'>" . $value["Permiso"] . " " . $value["Categoria"] . "</option>";
        }
        ?>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar" name="enviar1">
    </form>
    <?php
} else if (isset($_COOKIE["ultimoTest"]) && isset($_POST["siguiente"])) {
    if ($_COOKIE["ultimoTest"] == count($aTests)-1) {
        setcookie("ultimoTest", 0);
    } else {
        setcookie("ultimoTest", $_COOKIE["ultimoTest"] + 1);
    }

    $idTest = $_COOKIE["ultimoTest"];

    echo "<form method='post'>";
    foreach ($aTests[$idTest]["Preguntas"] as $key => $value) {
        echo $value["Pregunta"] . "<br>";
        foreach ($value["respuestas"] as $key2 => $value2) {
            echo "<input type='radio' name='pregunta" . $value["idPregunta"] . "' value='" . $value2 . "'>" . $value2 . "<br><br>";
        }
    }
    echo "<input type='submit' value='Enviar' name='enviar2'>";
    echo "<input type='hidden' name='idTest' value='" . $idTest . "'>";
    echo "</form>";
    echo "<input type='submit' value='Empezar' name='empezar'>";
}

if (isset($_POST["enviar1"])) {
    setcookie("ultimoTest", $_POST["nombre"]-1);
    $idTest = $_POST["nombre"]-1;

    echo "<form method='post'>";
    foreach ($aTests[$idTest]["Preguntas"] as $key => $value) {
        echo $value["Pregunta"] . "<br>";
        if ((file_exists("'dir_img_test" . $idTest+1 . "/img". $value["idPregunta"] .".jpg'")) == true) {
            echo "<img src='dir_img_test" . $idTest+1 . "/img". $value["idPregunta"] .".jpg'><br>";
        }
        foreach ($value["respuestas"] as $key2 => $value2) {
            echo "<input type='radio' name='pregunta" . $value["idPregunta"] . "' value='" . $value2 . "'>" . $value2 . "<br><br>";
        }
    }
    echo "<input type='submit' value='Enviar' name='enviar2'>";
    echo "<input type='hidden' name='idTest' value='" . $idTest . "'>";
    echo "<input type='submit' value='Empezar' name='empezar'>";
    echo "</form>";
}

if (isset($_POST["enviar2"])) {
    $errores = 0;
    foreach ($aTests[$_POST["idTest"]]["Corrector"] as $key => $value) {
        if (empty($_POST["pregunta" . $key+1])) {
            $errores++;
        } else if ($value != $_POST["pregunta" . $key+1][0]) {
            $errores++;
        } 
    }
    echo "<p>Errores: " . $errores . "</p>";

    echo "<form method='post'>";
    echo "<input type='submit' value='Empezar' name='empezar'>";
    echo "<input type='submit' value='Siguiente' name='siguiente'>";
    echo "</form>";
}

if (isset($_POST["empezar"])) {
    setcookie("ultimoTest", 1, time() - 1);
    header("Location: ej1.php");
}