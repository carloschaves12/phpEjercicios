<?php
use App\Models\User;
require_once("..\app\Config\constantes.php");

$user = new User();

session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = array(
        'usuario' => '',
        'perfil' => ''
    );
}

if (isset($_POST['enviar'])) {
    $resultado = $user->get([$_POST['usuario'], $_POST['contrasena']]);
    print_r($resultado);
    if ($_POST['usuario'] == "admin" && $_POST['contrasena'] == "admin") {
        $_SESSION['usuario']['perfil'] = "admin";
        $_SESSION['usuario']['usuario'] = "admin";
    } else {
        $_SESSION['usuario']['perfil'] = "invitado";
        $_SESSION['usuario']['usuario'] = "invitado";
    }
    //header('location:' . DIRBASEURL . '/palabra');
}
?>

<form method="post">
    <br>
    <label>Usuario: <input type="text" name="usuario"></label>
    <br>
    <label>contrasena: <input type="text" name="contrasena"></label>
    <br>
    <input type="submit" value="enviar" name="enviar">
</form>