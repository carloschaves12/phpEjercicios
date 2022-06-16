<?php

$ejercicios = array (
    array ('id'=>1, 'titulo'=>'Sopa de letras', 'descripcion'=>'Implementa la jugabilidad de una sopa de letras mediante el uso de sesiones.', 'enlace'=>'sopaDeLetras.php', 'codigo'=>'https://github.com/carloschaves12/phpEjercicios/blob/main/ra3/sesiones/sopaDeLetras.php'))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carlos Chaves Hernández</title>
</head>
<body>
    
    <?php 
    foreach ($ejercicios as $key => $value) {
        echo '<a href="' . $value['enlace'] . '" target="_blank">' . $value['id'] . $value['titulo'] .'</a> ' . $value['descripcion'] . '<a href=" ' . $value["codigo"] .'" target="_blank"> Código</a> </br>';
    }
    ?>
</body>
</html>