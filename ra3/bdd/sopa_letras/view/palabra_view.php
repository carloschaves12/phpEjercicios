<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palabras</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = array(
            'usuario' => '',
            'perfil' => ''
        );
    }
    print_r($_SESSION['usuario']);
    ?>

    <h1>Palabras</h1>

    <form method="post">
        <input type="text" name="palabra" placeholder="Introduce una palabra">
        <input type="submit" value="Buscar" name="buscar">
        <?php
        if ($_SESSION["usuario"]["usuario"] == "admin" && $_SESSION["usuario"]["perfil"] == "admin") {
            echo '<input type="submit" value="Añadir" name="añadir">';
            echo "<a href='" . DIRBASEURL . "/palabra/cierra_sesion" . "'>Cerrar sesión</a>";
        }
        ?>

    </form>
    <br>
    <a href=<?php echo DIRBASEURL . "/palabra/login" ?>>Login</a>
    <br>
    <br>

    <?php
    if ($_SESSION["usuario"]["usuario"] == "admin" && $_SESSION["usuario"]["perfil"] == "admin") {
        foreach ($data as $value) {
            echo $value["palabra"] . " <a href='" . DIRBASEURL . "/palabra/del/" . $value["id"] . "'>Del</a> <a href='" . DIRBASEURL . "/palabra/edit/" . $value["id"] . "/" . $value["palabra"] . "'>Edit</a> </br>";
        }
    } else {
        foreach ($data as $value) {
            echo $value["palabra"] . "</br>";
        }
    }
    ?>
</body>

</html>