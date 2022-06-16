<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarks</title>
</head>

<body>
    <h1><a href="<?php echo DIRBASEURL . '/bookmarks' ?>">Bookmarks</a></h1>

    <form method="post">
        <label>
            Introduce tu usuario: <input type="text" name="usuario">
        </label>
        <br>
        <label>
            Introduce tu contraseña: <input type="text" name="contrasena">
        </label>
        <br>
        <label>
            Introduce tu correo: <input type="email" name="email">
        </label>
        <br>
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>

</html>