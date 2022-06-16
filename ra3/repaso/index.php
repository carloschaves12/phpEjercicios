<?php

$ejercicios = array (
    array ('id'=>1, 'titulo'=>'Test online', 'descripcion'=>'Desarrollo de un sistema de test online para una autoescuela.
    Los test se encuentran almacenados en un array asociativo dentro de un directorio de configuración.
    Cada test utiliza un directorio para almacenar las fotos que necesita. El nombre de la carpeta es la
    concatenación de la cadena img y el número de test. Por ejemplo, para el test 1 las imágenes se guardan en
    el directorio img1. El nombre de cada foto coincide con el número de pregunta.
    Tareas.', 'enlace'=>'ej1/ej1.php', 'codigo'=>'https://github.com/carloschaves12/phpEjercicios/blob/main/ra3/repaso/ej1/ej1.php'),
    array ('id'=>2, 'titulo'=>'Puzles infantiles', 'descripcion'=>'Se debe crear una aplicación que permita resolver puzles infantiles de tres piezas. Se adjunta fichas de
    ejemplo, pero es necesario que personalices las fichas del rompecabezas.
    Aplica criterios de usabilidad en el diseño de la aplicación intentando conseguir la mejor experiencia de
    usuario.', 'enlace'=>'ej2/ej2.php', 'codigo'=>'https://github.com/carloschaves12/phpEjercicios/blob/main/ra3/repaso/ej2/ej2.php')
    )
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