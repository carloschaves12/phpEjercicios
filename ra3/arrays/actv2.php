<?php

$aPaises = array(
    'españa' => 'madrid',
    'francia' => 'paris',
    'italia' => 'roma',
    'alemania' => 'berlin',
    'portugal' => 'lisboa',
    'reinoUnido' => 'londres',
    'suecia' => 'estocolmo',
    'noruega' => 'oslo',
    'danimarca' => 'copenhague',
    'finlandia' => 'helsinki'
);

$paisesCorrectos = array();
$procesaFormulario = $procesaFormulario2 = false;
$msgError = "";


if (isset($_POST["enviar"])) {
    $procesaFormulario = true;

    foreach ($aPaises as $key => $value) {
        if (empty($_POST[$key])) {
            $procesaFormulario = false;
            $msgError = "Todos los paises son requeridos";
        }
    }
}

if ($procesaFormulario) {
    foreach ($aPaises as $key => $value) {
        if ($_POST[$key] == $value) {
            array_push($paisesCorrectos, "El pais $key es correcto");
        }
    }
}

if (isset($_POST["enviar2"])) {
    $procesaFormulario2 = true;
}

?>

<form action="" method="post">
    <?php
    
    foreach ($aPaises as $key => $value) {
        echo " $key <input type='input' name='$key'><br><br>";
    }
    echo "<span class='error'>$msgError</span><br /><br />";
    ?>
    <input type="submit" value="enviar" name="enviar">
</form>

<?php

if ($procesaFormulario) {

    echo "has acertado " . count($paisesCorrectos) . " paises de " . count($aPaises) . " <br>";
    echo "<form action='' method='post'>";
    foreach ($paisesCorrectos as $key => $value) {
        echo "<input type='hidden' name='paisesCorrectos[]' value='$value'>";
    }
    echo "<input type='submit' value='ver correctos' name='enviar2'>";
    echo "</form>";

}

if ($procesaFormulario2) {

    print_r($_POST);
    // if (empty($_POST["paisesCorrectos"])) {
    //     foreach ($_POST["paisesCorrectos"] as $key => $value) {
    //         echo $value . "<br>";
    //     }
    // } else {
    //     echo "no has acertado ningun pais";
    // }
    
}
?>

<style>
    .error {
        color: #FF0000;
    }
</style>