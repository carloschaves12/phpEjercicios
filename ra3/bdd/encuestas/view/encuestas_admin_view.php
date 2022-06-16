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

    <form method="post">
        <input type="text" name="descripcion" placeholder="Introduce una url">
        <input type="submit" value="Buscar" name="buscar">
        <?php
        echo '<input type="submit" value="Añadir" name="añadir">';

        echo "<a href='" . DIRBASEURL . "/encuestas/cierra_sesion" . "'>Cerrar sesión</a>";

        echo "<br>";
        echo "Estas logueado como: " . $_SESSION["usuario"]["perfil"];
        ?>

    </form>
    <br>

    <table class="demo">
        <thead>
            <tr>
                <th>descripcion</th>
                <th>fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $value) {
                echo "<tr>";
                echo "<td>" . $value["descripcion"] . "</td> <td>" . $value["fecha"] . "</td> <td><a href='" . DIRBASEURL . "/encuestas/del/" . $value["id"] . "'>Del</a></td> <td> <a href='" . DIRBASEURL . "/encuestas/edit/" . $value["id"] . "/" . $value["descripcion"] . "'>Edit</a></td> </br>";
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