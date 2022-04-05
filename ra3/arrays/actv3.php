<?php
$aComunidades = array(
    'Andalucia' => array("Almeria", "Cadiz", "Cordoba", "Granada", "Huelva", "Jaén", "Málaga", "Sevilla"),
    'Aragon' => array("Zaragoza", "Huesca", "Teruel"),
    'Asturias' => array("Asturias"),
    'Baleares' => array("Baleares"),
    'Canarias' => array("Las Palmas", "Santa Cruz de Tenerife"),
    'Cantabria' => array("Cantabria"),
    'Castilla y Leon' => array("Ávila", "Burgos", "León", "Palencia", "Salamanca", "Segovia", "Soria", "Valladolid", "Zamora"),
    'Castilla-La Mancha' => array("Albacete", "Ciudad Real", "Cuenca", "Guadalajara", "Toledo"),
    'Cataluña' => array("Barcelona", "Gerona", "Lleida", "Tarragona"),
    'Extremadura' => array("Badajoz", "Cáceres"),
    'Galicia' => array("A Coruna", "Lugo", "Ourense", "Pontevedra"),
);
$procesaFormulario = $procesaFormulario2 = false;
$comunidad = array_rand($aComunidades);
$correctas = 0;

echo $comunidad . "<br><br>";

if (isset($_POST["enviar"])) {
    $procesaFormulario = true;
}

if ($procesaFormulario) {
    foreach ($_POST["respuestas"] as $key => $value) {
        if (in_array($value, $aComunidades[$_POST["comunidad"]])) {
            $correctas++;
        }
    }
}

if (isset($_POST["enviar2"])) {
    $procesaFormulario = true;
    $procesaFormulario2 = true;
}

if ($procesaFormulario) {

?>
    <form action="" method="post">
        <?php
        foreach ($aComunidades as $key => $value) {
            for ($i = 0; $i < count($value); $i++) {
                if (in_array($value[$i], $_POST["respuestas"])) {
                    echo $value[$i] . "<input type='checkbox' name='respuestas[]' value='" . $value[$i] . "' checked><br>";
                } else{
                    echo $value[$i] . "<input type='checkbox' name='respuestas[]' value='" . $value[$i] . "'><br>";
                }
            }
        }

        ?>
        <input type="hidden" name="comunidad" value="<?php echo $comunidad ?>">
        <input type="submit" value="enviar" name="enviar">
    </form>
    <?php
    echo "La comunidad es $comunidad y has acertado $correctas de " . count($_POST["respuestas"]) . " <br>";
    ?>
    <form action="" method="post">
        <input type="submit" value="ver correctas" name="enviar2">
        <input type="hidden" name="comunidad" value="<?php echo $_POST["comunidad"] ?>">
        <input type="hidden" name="respuestas[]" value="<?php print_r($_POST["respuestas"]) ?>">
    </form>
<?php
} else {
?>

    <form action="" method="post">
        <?php
        foreach ($aComunidades as $key => $value) {
            for ($i = 0; $i < count($value); $i++) {
                echo $value[$i] . "<input type='checkbox' name='respuestas[]' value='" . $value[$i] . "'><br>";
            }
        }

        ?>
        <input type="hidden" name="comunidad" value="<?php echo $comunidad ?>">
        <input type="submit" value="enviar" name="enviar">
    </form>

<?php
}

if ($procesaFormulario2) {
    echo "Las respuestas correctas son: <br>";
    foreach ($aComunidades[$_POST["comunidad"]] as $key => $value) {
        echo $value . "<br>";
    }
}
