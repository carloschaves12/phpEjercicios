<?php

$p1 = $p2 = "";
$msgError1 = $msgError2 = $msgError3 = "";

if (isset($_POST["enviar"])) {
    $procesaFormulario = true;

    $p1 = $_POST["p1"];
    $p2 = $_POST["p2"];

    if ((empty($p1))) {
        $procesaFormulario = false;
        $msgError1 = "Contraseña 1 requerida";
    }

    if ((empty($p2))) {
        $procesaFormulario = false;
        $msgError2 = "Contraseña 2 requerida";
    }

    if ($p1 != $p2) {
        $procesaFormulario = false;
        $msgError3 = "Las contraseñas no coinciden";
    }
} else {
    $procesaFormulario = false;
}
?>
    <form action="" method="post">
        <label>Primera contraseña: <input type="password" name="p1" value=<?php echo $p1; ?>></label>
        <span class="error"><?php echo $msgError1; ?></span><br /><br />

        <label>Segunda contraseña: <input type="password" name="p2" value=<?php echo $p2; ?>></label>
        <span class="error"><?php echo $msgError2; ?></span><br /><br />
        <input type="submit" value="enviar" name="enviar"><br />
        <span class="error"><?php echo $msgError3; ?></span>

    </form>

    <?php

    if ($procesaFormulario) {

        echo "Las contraseñas introducidas coinciden";
    }
    ?>

    <style>
        .error {
            color: #FF0000;
        }
    </style>