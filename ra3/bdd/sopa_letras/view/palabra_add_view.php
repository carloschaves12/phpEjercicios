<?php
session_start();

if ($_SESSION['usuario']['usuario'] != "admin" && $_SESSION['usuario']['perfil'] != "admin") {
    header('location:' . DIRBASEURL . '/palabra');
}
?>

<form method="post">

    <input type="text" name="palabra" placeholder="Introduce la capital">
    <input type="submit" value="Añadir" name="añadir">

</form>