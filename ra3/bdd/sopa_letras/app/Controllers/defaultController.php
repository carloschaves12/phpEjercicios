<?php

namespace App\Controllers;

use App\Models\Palabra;
use App\Models\User;

require_once('..\app\Config\constantes.php');


class defaultController extends BaseController
{

    public function palabraAction()
    {
        $data = array();
        $palabra = Palabra::getInstancia();

        if (isset($_POST['buscar'])) {
            $palabra->setNombre($_POST['palabra']);
            $data = $palabra->getByNombre();
            $this->renderHTML('..\view\palabra_view.php', $data);
        } else if (isset($_POST['añadir'])) {
            header('location:' . DIRBASEURL . '/palabra/add');
        } else {
            $data = $palabra->get();
            $this->renderHTML('..\view\palabra_view.php', $data);
        }
    }

    public function annadirPalabraAction()
    {
        $data = array();
        $palabra = Palabra::getInstancia();

        if (isset($_POST["añadir"])) {
            $palabra->setNombre($_POST["palabra"]);
            $palabra->set();
            header('location:' . DIRBASEURL . '/palabra');
        } else {
            $this->renderHTML('..\view\palabra_add_view.php', $data);
        }
    }

    public function borrarPalabraAction($request)
    {
        $id = explode('/', $request)[3];

        $palabra = Palabra::getInstancia();

        $palabra->setId($id);
        $palabra->delete();
        header('location:' . DIRBASEURL . '/palabra');
    }

    public function editarPalabraAction($request)
    {
        $id = explode('/', $request)[3];
        $palabraAntigua = explode('/', $request)[4];
        $data = array($palabraAntigua);

        $palabra = Palabra::getInstancia();

        if (isset($_POST["editar"])) {
            $palabra->setId($id);
            $palabra->setNombre($_POST["palabra"]);
            $palabra->edit();
            header('location:' . DIRBASEURL . '/palabra');
        } else {
            $this->renderHTML('..\view\palabra_edit_view.php', $data);
        }
    }

    public function loginPalabraAction()
    {
        if (isset($_POST['enviar'])) {
            $user = User::getInstancia();
            $user->setUsuario($_POST['usuario']);
            $user->setContrasena($_POST['contrasena']);
            $resultado = $user->get();
            if (!empty($resultado)) {
                foreach ($resultado as $value) {
                    $_SESSION['usuario']['perfil'] = $value['perfil'];
                    $_SESSION['usuario']['usuario'] = $value['usuario'];
                    header('location:' . DIRBASEURL . '/palabra');
                }
            } else {
                header('location:' . DIRBASEURL . '/palabra/login');
            }
        } else {
            $this->renderHTML('..\view\palabra_login_view.php');
        }
    }

    public function cerrarSesionPalabraAction()
    {
        session_start();
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location:' . DIRBASEURL . "/palabra/login");
    }
}
