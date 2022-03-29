<?php

$procesaFormulario = false;
$array5 = array();
$array4 = array();
$array3 = array();
$array2 = array();
$array1 = array();

if (isset($_POST["enviar"])) {

    $procesaFormulario = true;
}

if ($procesaFormulario) {

    for ($i = 1; $i <= 10; $i++) {

        if ($_POST["item" . $i] == 5) {
            array_push($array5, "item" . $i);
        } else if ($_POST["item" . $i] == 4) {
            array_push($array4, "item" . $i);
        } else if ($_POST["item" . $i] == 3) {
            array_push($array3, "item" . $i);
        } else if ($_POST["item" . $i] == 2) {
            array_push($array2, "item" . $i);
        } else if ($_POST["item" . $i] == 1) {
            array_push($array1, "item" . $i);
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
            echo '<label> Item' . $i . ' 1<input type="radio" name="item' . $i . '" value="1"> 2<input type="radio" name="item' . $i . '" value="2"> 3<input type="radio" name="item' . $i . '" value="3"> 4<input type="radio" name="item' . $i . '" value="4"> 5<input type="radio" name="item' . $i . '" value="5"></label><br>';
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
        if (!empty($array5)) {
            foreach ($array5 as $key => $value) {
                echo $value . "<br>";
            }
            return;
        } else if (!empty($array4)) {
            foreach ($array4 as $key => $value) {
                echo $value . "<br>";
            }
            return;
        } else if (!empty($array3)) {
            foreach ($array3 as $key => $value) {
                echo $value . "<br>";
            }
            return;
        } else if (!empty($array2)) {
            foreach ($array2 as $key => $value) {
                echo $value . "<br>";
            }
            return;
        } else if (!empty($array1)) {
            foreach ($array1 as $key => $value) {
                echo $value . "<br>";
            }
            return;
        }
    }
    ?>
</body>

</html>