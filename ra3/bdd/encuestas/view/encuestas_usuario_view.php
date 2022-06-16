<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuestas</title>
</head>

<body>

    <h1><a href="<?php echo DIRBASEURL . '/encuestas' ?>">Encuestas</a></h1>

    <form method="post">
        <?php
        echo "<a href='" . DIRBASEURL . "/encuestas/cierra_sesion" . "'>Cerrar sesión</a>";
        echo "<br>";
        echo "Estas logueado como: " . $_SESSION["usuario"]["perfil"];
        ?>
        <br>
        <select name="encuesta">
            <?php
            foreach ($data as $value) {
                echo "<option value='" . $value["id"] . "'>" . $value["descripcion"] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Elegir" name="elegir">
    </form>
</body>

</html>