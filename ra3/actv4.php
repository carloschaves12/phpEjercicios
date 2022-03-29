<?php

$procesaFormulario = false;
$maximo = 0;
$aMaximos = array();

if (isset($_POST["enviar"])) {

    $procesaFormulario = true;
}

if ($procesaFormulario) {
    for ($i = 1; $i <= 10; $i++) {
        foreach ($_POST[$i] as $key => $value) {
            if ($value > $maximo) {
                $maximo = $value;
                $aMaximos = array();
                array_push($aMaximos, $i);
            } else if ($value == $maximo) {
                array_push($aMaximos, $i);
            }
        }
    }
}
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
    <form method="post">
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "item$i";
            for ($j = 0; $j <= 5; $j++) {
                echo " $j<input type='radio' name='" . $i . "[]' value='$j'>";
            }
            echo "<br>";
        }
        ?>

        <input type="submit" value="enviar" name="enviar">
    </form>

    <style>
        .error {
            color: #FF0000;
        }
    </style>

    <?php

    if ($procesaFormulario) {
        foreach ($aMaximos as $key => $value) {
            echo "item$value <br>"; 
        }
    }
    ?>
</body>

</html>