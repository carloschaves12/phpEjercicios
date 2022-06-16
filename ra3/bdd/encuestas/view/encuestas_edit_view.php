<?php
require_once('..\app\Config\constantes.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuestas</title>
</head>

<body>
    <h1><a href="<?php echo DIRBASEURL . '/encuestas'?>">Encuestas</a></h1>
    <form method="post">
        <label>
            Introduce la nueva descripcion
        <input type="text" name="descripcion" placeholder="Introduce la nueva descripcion" value="<?php echo (str_replace("%20", " ", $data[0])); ?>">
        </label>
        <br>
        <input type="submit" value="Editar" name="editar">
    </form>
</body>

</html>