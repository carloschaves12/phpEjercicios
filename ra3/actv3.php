<?php
$n1 = rand(1,999);
$n2 = rand(1,999);
$n3 = rand(0,3);
$operaciones = ["+", "-", "*", "/"];
$msgError = "";
$resultadoOperacion = 0;
$procesaFormulario = false;

if (isset($_POST["enviar"])) {
    
    $procesaFormulario = true;

    if (empty($_POST["resultado"])) {
        $procesaFormulario = false;
        $msgError = "Resultado no introducido";
    }

}

if ($procesaFormulario) {

    switch ($_POST["operacion"]) {
        case '+':
            $resultadoOperacion = $_POST["num1"] + $_POST["num2"];
            break;
        
        case '-':
            $resultadoOperacion = $_POST["num1"] - $_POST["num2"];
            break;

        case '*':
            $resultadoOperacion = $_POST["num1"] * $_POST["num2"];
            break;

        case '/':
            $resultadoOperacion = $_POST["num1"] / $_POST["num2"];
            break;
    }

    if ($resultadoOperacion == $_POST["resultado"]) {
        $mensaje = $_POST['num1'] . $_POST['operacion'] . $_POST['num2'] . " = $resultadoOperacion. El resultado es correcto";
    } else {
        $mensaje = $_POST['num1'] . $_POST['operacion'] . $_POST['num2'] . " = $resultadoOperacion no ". $_POST["resultado"] . " El resultado no es correcto";
    }
}
?>
    <form action="" method="post">
        <?php echo "$n1 $operaciones[$n3] $n2 =" ?> <input type="number" name="resultado">
        <span class="error"><?php echo $msgError; ?></span><br /><br />
        <input type="submit" value="enviar" name="enviar">
        <input type="hidden" name="num1" value="<?php echo $n1 ?>">
        <input type="hidden" name="num2" value="<?php echo $n2 ?>">
        <input type="hidden" name="operacion" value="<?php echo $operaciones[$n3] ?>">
    </form>

    <?php

    if ($procesaFormulario) {
        echo $mensaje;
    }
    ?>

    <style>
        .error {
            color: #FF0000;
        }
    </style>
