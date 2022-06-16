<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarks</title>
</head>

<body>

    <h1><a href="<?php echo DIRBASEURL . '/bookmarks' ?>">Bookmarks</a></h1>

    <form method="post">
        <input type="text" name="bm_url" placeholder="Introduce una url">
        <input type="submit" value="Buscar" name="buscar">
        <?php
        echo '<input type="submit" value="Añadir" name="añadir">';

        echo "<a href='" . DIRBASEURL . "/bookmarks/cierra_sesion" . "'>Cerrar sesión</a>";

        echo "<br>";
        echo "Estas logueado como: " . $_SESSION["usuario"]["perfil"];
        ?>

    </form>
    <br>

    <form method="post">
    <?php
    foreach ($data as $value) {
        echo $value["user"] . '<input type="checkbox" name="bloqueados[]" value="' . $value["id"] .'"> <br>';
    }
    ?>
    <br>
    <input type="submit" value="Dar de alta" name="alta">
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