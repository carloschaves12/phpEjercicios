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
        foreach ($data["preguntas"] as $preguntas) {
            echo $preguntas[0]["descripcion"];
            echo "<br>";
            foreach ($data["opciones"] as $opciones) {
                for ($i = 0; $i < count($opciones); $i++) {
                    if ($preguntas[0]["id"] == $opciones[0]["idPregunta"]) {
                        echo "<input type='radio' name='idPreguntas[]" . $preguntas[0]["id"] . "' value='" . $opciones[$i]["id"] . "'>" . $opciones[$i]["opciones"] . "<br>";
                    }
                }
            }
            echo "<br>";
        }

        ?>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>