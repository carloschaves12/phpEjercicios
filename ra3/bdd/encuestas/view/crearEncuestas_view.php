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
        ?>
    <br>

    <form method="post">
        <label>
            Introduce una encuesta: <input type="text" name="encuesta">
        </label>

        <?php
        foreach ($data["preguntas"] as $preguntas) {
            echo "<br>";
            echo "<input type='checkbox' name='idPreguntas[]' value='" . $preguntas["id"] . "'>" . $preguntas["descripcion"] . "<br>";
        }
        ?>

        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
<style>
    table {
        border: 1px solid #000000;
        border-collapse: collapse;
        padding: 5px;
    }

    .demo th {
        border: 1px solid #000000;
        padding: 5px;
        background: #FFFFFF;
    }

    .demo td {
        border: 1px solid #000000;
        padding: 5px;
    }
</style>

</html>