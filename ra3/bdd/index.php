<?php

$ejercicios = array (
    array ('id'=>1, 'titulo'=>'Bookmarks', 'descripcion'=>'Bookmarks', 'enlace'=>'bookmarks/public/index.php', 'codigo'=>'https://github.com/carloschaves12/phpEjercicios/tree/main/ra3/bdd/bookmarks'),
    array ('id'=>2, 'titulo'=>'Encuestas', 'descripcion'=>'Encuestas', 'enlace'=>'encuestas/public/index.php', 'codigo'=>'https://github.com/carloschaves12/phpEjercicios/tree/main/ra3/bdd/encuestas'),
    array ('id'=>3, 'titulo'=>'Sopa de letras.', 'descripcion'=>'Sopa de letras', 'enlace'=>'sopa_letras/public/index.php', 'codigo'=>'https://github.com/carloschaves12/phpEjercicios/tree/main/ra3/bdd/sopa_letras'),
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