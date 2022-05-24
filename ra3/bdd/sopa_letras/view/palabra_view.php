<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palabras</title>
</head>

<body>

    <h1><a href="<?php echo DIRBASEURL . '/palabra' ?>">Palabras</a></h1>

    <form method="post">
        <input type="text" name="palabra" placeholder="Introduce una palabra">
        <input type="submit" value="Buscar" name="buscar">
        <?php
        if ($_SESSION["usuario"]["usuario"] == "admin" && $_SESSION["usuario"]["perfil"] == "admin") {
            echo '<input type="submit" value="Añadir" name="añadir">';
        }
        if ($_SESSION["usuario"]["perfil"] == "invitado") {
            echo"<a href='" . DIRBASEURL . "/palabra/login'>Login</a>";
        } else {
            echo "<a href='" . DIRBASEURL . "/palabra/cierra_sesion" . "'>Cerrar sesión</a>";
        }
        echo "<br>";
        echo "Estas logueado como: " . $_SESSION["usuario"]["perfil"];
        ?>

    </form>
    <br>

    <table class="demo">
        <thead>
            <tr>
                <th>id</th>
                <th>palabra</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($_SESSION["usuario"]["usuario"] == "admin" && $_SESSION["usuario"]["perfil"] == "admin") {
                foreach ($data as $value) {
                    echo "<tr>";
                    echo "<td>" . $value["id"] . "</td> <td>" . $value["palabra"] . "</td> <td><a href='" . DIRBASEURL . "/palabra/del/" . $value["id"] . "'>Del</a></td> <td> <a href='" . DIRBASEURL . "/palabra/edit/" . $value["id"] . "/" . $value["palabra"] . "'>Edit</a></td> </br>";
                    echo "</tr>";
                }
            } else {
                foreach ($data as $value) {
                    echo "<tr>";
                    echo "<td>" . $value["id"] . "</td> <td> " . $value["palabra"] . "</td></br>";
                    echo "</tr>";
                }
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