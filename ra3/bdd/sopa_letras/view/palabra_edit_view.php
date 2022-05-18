<?php
session_start();

if ($_SESSION['usuario']['usuario'] != "admin" && $_SESSION['usuario']['perfil'] != "admin") {
    header('location:' . DIRBASEURL . '/palabra');
}
?>
<form method="post">
    <input type="text" name="palabra" placeholder="Introduce la nueva capital" value="<?php echo($data[0]); ?>">
    <input type="submit" value="Editar" name="editar">
</form>

