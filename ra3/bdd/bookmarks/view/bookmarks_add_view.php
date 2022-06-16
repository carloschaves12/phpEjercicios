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
    <h1><a href="<?php echo DIRBASEURL . '/bookmarks' ?>">Bookmarks</a></h1>

    <form method="post">

        <input type="text" name="bm" placeholder="Introduce la url">
        <br>
        <input type="text" name="descripcion" placeholder="Introduce la descripcion">
        <br>
        <input type="submit" value="Añadir" name="añadir">

    </form>
</body>

</html>