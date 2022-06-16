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
    <h1><a href="<?php echo DIRBASEURL . '/bookmarks'?>">Bookmarks</a></h1>
    <form method="post">
        <label>
            Introduce la nueva url:
        <input type="text" name="bm" placeholder="Introduce la nueva url" value="<?php echo $data[0]; ?>">
        </label>
        <br>
        <label>
            Introduce la nueva descripcion
        <input type="text" name="descripcion" placeholder="Introduce la nueva descripcion" value="<?php echo (str_replace("%20", " ", $data[1])); ?>">
        </label>
        <br>
        <input type="submit" value="Editar" name="editar">
    </form>
</body>

</html>