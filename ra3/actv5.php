<?php
$procesaFormulario = $procesaFormulario2 = false;
$msgRadio = $msgError = $msgIgual= "";

if (isset($_POST["enviar"])) {

    $procesaFormulario = true;

    if (empty($_POST["figura"])) {
        $procesaFormulario = false;
        $msgRadio = "Debes de selecionar un radio buttom";
    }
}

if (isset($_POST["enviar2"])) { 

    $procesaFormulario = true;
    $procesaFormulario2 = true;

    switch ($_POST["figura"]) {
        case 'circle':
            if ((empty($_POST["radio"]))) {
                $procesaFormulario2 = false;
                $msgError = "Debes de rellenar el formulario";
            }
            break;

        case 'rect':
            if ((empty($_POST["ancho"])) || (empty($_POST["alto"]))) {
                $procesaFormulario2 = false;
                $msgError = "Debes de rellenar el formulario";
            }

            if ($_POST["ancho"] == $_POST["alto"]) {
                $procesaFormulario2 = false;
                $msgError = "Debes de rellenar el formulario";
            }
            break;

        case 'cuadrado':
            if ((empty($_POST["dimensiones"]))) {
                $procesaFormulario2 = false;
                $msgError = "Debes de rellenar el formulario";
            }
            break;
    }
}
?>

<form action="" method="post">
    círculo <input type="radio" name="figura" value="circle">
    rectángulo <input type="radio" name="figura" value="rect">
    cuadrado <input type="radio" name="figura" value="cuadrado">
    <span class="error"><?php echo $msgRadio; ?></span><br/><br/>
    <br>
    color <select name="color">
        <option value="red">rojo</option>
        <option value="green">verde</option>
        <option value="blue">azul</option>
        <option value="yellow">amarillo</option>
    </select>
    <br>
    <input type="submit" value="enviar" name="enviar">
</form>

<style>
    .error {
        color: #FF0000;
    }
</style>

<form action="" method="post">
    <?php

    if ($procesaFormulario) {
        switch ($_POST["figura"]) {
            case 'circle':
                echo 'introduce el radio <input type="number" name="radio"> <input type="hidden" name="figura" value=' . $_POST["figura"] . '> <input type="hidden" name="color" value=' . $_POST["color"] . ' > <span class="error"> ' . $msgError . ' </span><br/><br/>';
                break;

            case 'rect':
                echo 'introduce el alto <input type="number" name="alto"> introduce el ancho <input type="number" name="ancho"> <input type="hidden" name="figura" value=' . $_POST["figura"] . '> <input type="hidden" name="color" value=' . $_POST["color"] . '> <span class="error"> ' . $msgError . ' </span><br/><br/>';
                break;

            case 'cuadrado':
                echo 'introduce el alto y ancho <input type="number" name="dimensiones"> <input type="hidden" name="figura" value=' . $_POST["figura"] . '> <input type="hidden" name="color" value=' . $_POST["color"] . '> <span class="error"> ' . $msgError . ' </span><br/><br/>';
                break;
        }

        echo '<input type="submit" value="enviar" name="enviar2">';
    }
    ?>
</form>

<?php

if ($procesaFormulario2) {

    echo '<svg width="400" height="400" >';
    switch ($_POST["figura"]) {
        case 'circle':
            echo '<' . $_POST["figura"] . ' cx="200" cy="180" r="' . $_POST["radio"] . '" fill="' . $_POST["color"] . '"/>';
            break;

        case 'rect':
            echo '<' . $_POST["figura"] . ' x="' . $_POST["ancho"] / 2 . '" y="' . $_POST["alto"] / 2 . '" width="' . $_POST["ancho"] . '" height="' . $_POST["alto"] . '" fill="' . $_POST["color"] . '"/>';
            break;

        case 'cuadrado':
            echo '<rect x="' . $_POST["dimensiones"] / 2 . '" y="' . $_POST["dimensiones"] / 2 . '" width="' . $_POST["dimensiones"] . '" height="' . $_POST["dimensiones"] . '" fill="' . $_POST["color"] . '"/>';
            break;
    }
    echo '</svg>';
}
