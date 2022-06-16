<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuestas</title>
</head>

<body>

    <h1><a href="<?php echo DIRBASEURL . '/encuestas' ?>">Encuestas</a></h1>
    <form method="post">
        <?php
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        // foreach ($data as $key => $value) {
        //     foreach ($value as $key2 => $value2) {
        //         foreach ($value2 as $key3 => $value3) {
        //             var_dump($value3["idPregunta"]);

        //             if ($key3 == "descripcion") {
        //                 echo $value3;
        //             } else if ($key3 == "opciones") {
        //                 echo "<input type='radio' name='" . $value3 == "idPregunta" . "' value='$value3'>$value3<br>";
        //             }
        //         }
        //         echo "<br>";
        //     }
        // }

        if (isset($_POST["enviar"])) {
           print_r($_POST);
        }
        ?>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>