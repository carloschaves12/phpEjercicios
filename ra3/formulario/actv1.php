<?php

$n1 = $n2 = 0;
$msgError1 = $msgError2 = $msgErrorMenor = "";

if (isset($_POST["enviar"])) {
    $procesaFormulario = true;

    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];

    if ((empty($n1))) {
        $procesaFormulario = false;
        $msgError1 = "Número 1 requerido";
    }

    if ((empty($n2))) {
        $procesaFormulario = false;
        $msgError2 = "Número 2 requerido";
    }

    if ($n1 > $n2) {
        $procesaFormulario = false;
        $msgErrorMenor = "El primer número no puede ser mayor que el segundo";
    }

} else {
    $procesaFormulario = false;
}

if ($procesaFormulario) {

    $numAleatorio = rand($n1, $n2);

}
?>
    <form action="" method="post">
        <label>Primer número: <input type="number" name="n1" value=<?php echo $n1; ?>></label>
        <span class="error"><?php echo $msgError1; ?></span><br /><br />
        <span class="error"><?php echo $msgErrorMenor; ?></span><br /><br />

        <label>Segundo número: <input type="number" name="n2" value= <?php echo $n2; ?>></label>
        <span class="error"><?php echo $msgError2; ?></span><br /><br />

        <input type="submit" value="enviar" name="enviar">
    </form>

    <?php
    if ($procesaFormulario) {
        echo "Número aleatorio generado entre $n1 y $n2 = " . $numAleatorio;
    }
    ?>

    <style>
        .error {
            color: #FF0000;
        }
    </style>