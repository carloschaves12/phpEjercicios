<?php
$usuario = "";
$contrasena = "";

if (isset($_POST["enviar"])) {
    echo "Hola mundo";
    if (isset($_POST["guardar"])) {
        setcookie("usuario", $_POST["usuario"]);
        setcookie("contrasena", $_POST["contrasena"]);
    } else {
        setcookie("usuario", $_POST["usuario"], time() - 1);
        setcookie("contrasena", $_POST["contrasena"], time() - 1);
    }

    if (isset($_COOKIE["usuario"])) {
        $usuario = $_COOKIE["usuario"];
    }

    if (isset($_COOKIE["contrasena"])) {
        $contrasena = $_COOKIE["contrasena"];
    }
    
} else {
    ?>

    
<form method="post">
    <input type="text" name="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>">
    <br>
    <input type="password" name="contrasena" placeholder="Contraseña" value="<?php echo $contrasena; ?>">
    <br>
    Guardar datos<input type="checkbox" name="guardar">
    <br>
    <input type="submit" name="enviar" value="Enviar">
</form>

<?php

}
