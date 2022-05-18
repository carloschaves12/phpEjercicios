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
    if (!empty($resultado)) {
        foreach ($resultado as $value) {
            $_SESSION['usuario']['perfil'] = $value['perfil'];
            $_SESSION['usuario']['usuario'] = $value['usuario'];
        }
    }
    header('location:' . DIRBASEURL . '/palabra');
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