<?php
require_once('..\app\Config\constantes.php');
?>

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
        <br>
        <label>Usuario: <input type="text" name="usuario"></label>
        <br>
        <label>contrasena: <input type="text" name="contrasena"></label>
        <br>
        <?php echo $data["0"] . " + " . $data["1"] . " =" ?> <input type="number" name="resultado">
        <input type="hidden" name="num1" value="<?php echo $data["0"] ?>">
        <input type="hidden" name="num2" value="<?php echo $data["1"] ?>">
        <br>
        <input type="submit" value="enviar" name="enviar">
        <input type="submit" value="registarse" name="registrar">
    </form>
    <?php
    echo "<br>";
    if ($_SESSION["usuario"]["bloqueado"] == 0) {
        echo "El usuario no esta dado de alta";
    }
    ?>
</body>

</html>