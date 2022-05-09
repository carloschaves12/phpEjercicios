<?php

session_start();
if (!isset($_SESSION['puzlesResueltos'])) {
    $_SESSION['puzlesResueltos'] = array();
}

$puzles = array(
    array("1", "5"),
    array("2", "Captura"),
    array("3", "4"),
    array("7", "12"),
    array("8", "10"),
    array("9", "11"),
);

if (isset($_GET['pieza1'])) {
    $pieza1 = $_GET["pieza1"];
    $pieza2 = $puzles[rand(0, count($puzles) - 1)][rand(0, 1)];
}

if (isset($_GET['pieza2'])) {
    $pieza2 = $_GET["pieza2"];
    $pieza1 = $puzles[rand(0, count($puzles) - 1)][rand(0, 1)];
}

if (!isset($_GET['pieza1']) && !isset($_GET['pieza2']) && !isset($_POST['validar'])) {
    $pieza1 = $puzles[rand(0, count($puzles) - 1)][rand(0, 1)];
    $pieza2 = $puzles[rand(0, count($puzles) - 1)][rand(0, 1)];
}

if (isset($_POST['validar'])) {
    foreach ($puzles as $key => $value) {
        if($value[0] == $_POST['pieza1'] && $value[1] == $_POST['pieza2']){
            array_push($_SESSION['puzlesResueltos'], array($_POST['pieza1'], $_POST['pieza2']));
            unset($puzles[$key]);
        }
    }
    $pieza1 = $_POST["pieza1"];
    $pieza2 = $_POST["pieza2"];
}

echo "<p> Has acertado " . count($_SESSION['puzlesResueltos']) . "</p>";
print_r($puzles)

?>

<form method="post">

    <a href="ej2.php?pieza2=<?php echo $pieza2?>"> <img src="piezas/<?php echo $pieza1 ?>.JPG"> </a>
    <br>
    <a href="ej2.php?pieza1=<?php echo $pieza1?>"> <img src="piezas/<?php echo $pieza2 ?>.JPG"> </a>
    <br>

    <input type="hidden" name="pieza1" value="<?php echo $pieza1?>">
    <input type="hidden" name="pieza2" value="<?php echo $pieza2?>">

    <input type="submit" value="Validar" name="validar">
    <a href="cierraSesion.php">Salir</a> <br>
</form>