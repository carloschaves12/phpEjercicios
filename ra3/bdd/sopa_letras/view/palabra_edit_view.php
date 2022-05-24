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
    <h1><a href="<?php echo DIRBASEURL . '/palabra'?>">Palabras</a></h1>
    <form method="post">
        <input type="text" name="palabra" placeholder="Introduce la nueva capital" value="<?php echo ($data[0]); ?>">
        <input type="submit" value="Editar" name="editar">
    </form>
</body>

</html>