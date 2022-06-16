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

    <table class="demo">
        <thead>
            <tr>
                <th>bookmarks url</th>
                <th>descripción</th>
                <th>borrar</th>
                <th>editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $value) {
                echo "<tr>";
                echo "<td><a href='" . $value["bm_url"] . "'>" . $value["bm_url"] . "</a> </td> <td>" . $value["descripcion"] . "</td> <td><a href='" . DIRBASEURL . "/bookmarks/del/" . $value["id"] . "'>Del</a></td> <td> <a href='" . DIRBASEURL . "/bookmarks/edit/" . $value["id"] . "/" . $value["bm_url"] . "/" . $value["descripcion"] ."'>Edit</a></td> </br>";
                echo "</tr>";
            }
            ?>
        <tbody>
    </table>
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