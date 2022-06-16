<?php

namespace App\Controllers;

use App\Models\Bookmarks;
use App\Models\User;

require_once('..\app\Config\constantes.php');


class defaultController extends BaseController
{

    public function loginBookmarksAction()
    {
        $n1 = rand(0, 10);
        $n2 = rand(0, 10);
        $data = array($n1,$n2);

        if (isset($_POST['enviar'])) {
            $user = User::getInstancia();
            $user->setUser($_POST['usuario']);
            $user->setPsw($_POST['contrasena']);
            $resultado = $user->get();
            if (!empty($resultado)) {
                foreach ($resultado as $value) {
                    $_SESSION['usuario']['perfil'] = $value['perfil'];
                    $_SESSION['usuario']['usuario'] = $value['user'];
                    $_SESSION['usuario']['id'] = $value['id'];
                    $_SESSION['usuario']['bloqueado'] = $value['bloqueado'];
                }
                if (($_SESSION['usuario']['bloqueado'] == 1) && ($_POST["num1"] + $_POST["num2"] == $_POST["resultado"])) {
                    header('location:' . DIRBASEURL . '/bookmarks');
                } else {
                    header('location:' . DIRBASEURL . '/bookmarks/login');
                }
            } else {
                header('location:' . DIRBASEURL . '/bookmarks/cierra_sesion');
            }
        } else if(isset($_POST['registrar'])) {
            header('location:' . DIRBASEURL . '/bookmarks/registrar');
        } else {
            $this->renderHTML('..\view\bookmarks_login_view.php', $data);
        }
    }

    public function registrarBookmarksAction() {
        if (isset($_POST['enviar']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
            $user = User::getInstancia();
            $user->setNombre($_POST['usuario']);
            $user->setUser($_POST['usuario']);
            $user->setPsw($_POST['contrasena']);
            $user->setEmail($_POST['email']);
            $user->setPerfil("usuario");
            $user->setBloqueado(0);
            $user->set();
            header('location:' . DIRBASEURL . '/bookmarks/login');
        } else {
            $this->renderHTML('..\view\bookmarks_registrar_view.php');
        }
    }

    public function cerrarSesionBookmarksAction()
    {
        session_start();
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location:' . DIRBASEURL . "/bookmarks/login");
    }

    public function bookmarksAction()
    {
        $data = array();
        $bookMarks = Bookmarks::getInstancia();
        $user = User::getInstancia();

        if ($_SESSION["usuario"]["perfil"] == "usuario") {
            if (isset($_POST['buscar'])) {
                $bookMarks->setUrl($_POST['bm_url']);
                $data = $bookMarks->getBookmarksByUrl();
                $this->renderHTML('..\view\bookmarks_view.php', $data);
            } else if (isset($_POST['añadir'])) {
                header('location:' . DIRBASEURL . '/bookmarks/add');
            } else {
                $bookMarks->setIdUsuario($_SESSION["usuario"]["id"]);
                $data = $bookMarks->getBookmarksByUserId();
                $this->renderHTML('..\view\bookmarks_user_view.php', $data);
            }
        } else if($_SESSION["usuario"]["perfil"] == "admin") {
            $data = $user->getAll();
            $this->renderHTML('..\view\bookmarks_admin_view.php', $data);
            if (isset($_POST['alta'])) {
                foreach ($_POST['bloqueados'] as $value) {
                    $user->setId($value);
                    $user->setBloqueado(1);
                    $user->editBloqueado();
                }
            }
        }
    }

    public function borrarBookmarksAction($request) {
        $id = explode('/', $request)[3];
        $bookMarks = Bookmarks::getInstancia();
        $bookMarks->setId($id);
        $bookMarks->delete();
        header('location:' . DIRBASEURL . '/bookmarks');
    }

    public function editarBookmarksAction($request) {
        $id = explode('/', $request)[3];
        $bmAntiguo = "";
        for ($i=4; $i < count(explode('/', $request))-1; $i++) { 
            $bmAntiguo = $bmAntiguo . explode('/', $request)[$i] . "/";
        }
        
        $descripcionAntigua = end(explode('/', $request));
        $data = array($bmAntiguo, $descripcionAntigua);

        $bookMarks = Bookmarks::getInstancia();

        if (isset($_POST["editar"])) {
            $bookMarks->setId($id);
            $bookMarks->setUrl($_POST["bm"]);
            $bookMarks->setDescripcion($_POST["descripcion"]);
            $bookMarks->edit();
            header('location:' . DIRBASEURL . '/bookmarks');
        } else {
            $this->renderHTML('..\view\bookmarks_edit_view.php', $data);
        }
    }

    public function annadirBookmarksAction() {
        if (isset($_POST["añadir"])) {
            $bookMarks = Bookmarks::getInstancia();
            $bookMarks->setUrl($_POST["bm"]);
            $bookMarks->setDescripcion($_POST["descripcion"]);
            $bookMarks->setIdUsuario($_SESSION["usuario"]["id"]);
            $bookMarks->set();
            header('location:' . DIRBASEURL . '/bookmarks');
        } else {
            $this->renderHTML('..\view\bookmarks_add_view.php');
        }
        
    }
}
