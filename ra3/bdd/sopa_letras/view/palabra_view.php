<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palabras</title>
</head>
<body>

    <h1>Palabras</h1>

    <form method="post">
        <input type="text" name="palabra" placeholder="Introduce una palabra">
        <input type="submit" value="Buscar" name="buscar">
        <input type="submit" value="Añadir" name="añadir">
    </form>

    <?php
    foreach ($data as $value) {
        echo $value["palabra"] ." <a href='" . DIRBASEURL . "/palabra/del/" . $value["id"] . "'>Del</a> <a href='" . DIRBASEURL . "/palabra/edit/" . $value["id"] . "/" . $value["palabra"] . "'>Edit</a> </br>";
    }
    ?>
</body>
</html>