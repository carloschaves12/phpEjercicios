<?php

namespace App\Controllers;

use App\Models\User;

require_once('..\app\Config\constantes.php');


class SesionesController extends BaseController {

    public function loginEncuestasAction() {
        if (isset($_POST['enviar'])) {
            $user = User::getInstancia();
            $user->setUsuario($_POST['usuario']);
            $user->setPassword($_POST['contrasena']);
            $resultado = $user->get();
            if (!empty($resultado)) {
                foreach ($resultado as $value) {
                    $_SESSION["usuario"]["usuario"] = $value["usuario"];
                    $_SESSION["usuario"]["perfil"] = $value["perfil"];
                    $_SESSION["usuario"]["id"] = $value["id"];
                    header('location:' . DIRBASEURL . '/encuestas');

                }
            } else {
                header('location:' . DIRBASEURL . '/encuestas/login');
            }
        } else if (isset($_POST["registrar"])){
            header('location:' . DIRBASEURL . '/encuestas/registrar');
        } else {
            $this->renderHTML('..\view\encuestas_login_view.php');

        }
    }

    public function registrarEncuestasAction() {
        if (isset($_POST['enviar']) && !empty($_POST['nombre']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
            $user = User::getInstancia();
            $user->setNombre($_POST['nombre']);
            $user->setUsuario($_POST['usuario']);
            $user->setPassword($_POST['contrasena']);
            $user->setPerfil("usuario");
            $user->set();
            header('location:' . DIRBASEURL . '/encuestas/login');
        } else {
            $this->renderHTML('..\view\encuestas_registrar_view.php');
        }
    }

    public function cerrarSesionEncuestasAction()
    {
        session_start();
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location:' . DIRBASEURL . "/encuestas/login");
    }
}