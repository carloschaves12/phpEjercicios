<?php
require_once('..\app\Config\constantes.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><a href="<?php echo DIRBASEURL . '/palabra' ?>">Palabras</a></h1>

    <form method="post">
        <br>
        <label>Usuario: <input type="text" name="usuario"></label>
        <br>
        <label>contrasena: <input type="text" name="contrasena"></label>
        <br>
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>

</html>