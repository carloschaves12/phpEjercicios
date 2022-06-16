<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarks</title>
</head>

<body>

    <h1><a href="<?php echo DIRBASEURL . '/encuestas' ?>">Encuestas</a></h1>

    <?php
    echo "<a href='" . DIRBASEURL . "/encuestas/cierra_sesion" . "'>Cerrar sesión</a>";

    echo "<br>";
    echo "Estas logueado como: " . $_SESSION["usuario"]["perfil"];

    $numPreguntas = 0;
    $numOpciones = 0;
    ?>

    <br>

    <form method="post">
        <label>
            Nombre de la encuesta
            <input type="text" name="nombreEncuesta">
        </label>
        <br>
        <label>
            Número de preguntas
            <input type="number" name="numPreguntas" value="<?php echo $numPreguntas ?>">
        </label>
        <br>
        <label>
            Numero de opciones por pregunta
            <input type="number" name="numOpciones" value="<?php echo $numOpciones ?>">
        </label>
        <input type="submit" value="enviar" name="enviar">
    </form>

    <?php

    if (isset($_POST["enviar"])) {
        $numPreguntas = $_POST["numPreguntas"];
        $numOpciones = $_POST["numOpciones"];
    }
    ?>

</body>

</html>