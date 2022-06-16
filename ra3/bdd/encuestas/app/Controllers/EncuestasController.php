<?php

namespace App\Controllers;

use App\Models\Encuestas;
use App\Models\Preguntas;
use App\Models\Opciones;

require_once('..\app\Config\constantes.php');


class EncuestasController extends BaseController
{

    public function encuestasAction()
    {
        $data = array();

        $encuestas = Encuestas::getInstancia();

        if ($_SESSION["usuario"]["perfil"] == "usuario") {
            if (isset($_POST["buscar"])) {
                $encuestas->setDescripcion($_POST["descripcion"]);
                $data = $encuestas->getByDescripcion();
                $this->renderHTML('..\view\encuestas_usuario_view.php', $data);
            } else if (isset($_POST["elegir"])) {
                header('location:' . DIRBASEURL . '/encuestas/mostrarEncuesta/' . $_POST["encuesta"]);
            } else if (isset($_POST["respuesta"])) {
                print_r($_POST);
            } else {
                $data = $encuestas->get();
                $this->renderHTML('..\view\encuestas_usuario_view.php', $data);
            }
        } else if ($_SESSION["usuario"]["perfil"] == "admin") {
            if (isset($_POST["añadir"])) {
                $this->renderHTML('..\view\encuestas_add_view.php', $data);
            } else {
                $data = $encuestas->get();
                $this->renderHTML('..\view\encuestas_admin_view.php', $data);
            }
        }
    }

    public function mostrarEncuestasAction($request)
    {
        $data = array();

        $preguntas = Preguntas::getInstancia();

        $id = end(explode('/', $request));
        $preguntas->setId($id);
        $data = $preguntas->getById();
        $this->renderHTML('..\view\mostrarEncuestas_view.php', $data);
    }

    public function borrarEncuestasAction($request)
    {
        $id = explode('/', $request)[3];
        $encuestas = Encuestas::getInstancia();
        $encuestas->setId($id);
        $encuestas->delete();
        header('location:' . DIRBASEURL . '/encuestas');
    }

    public function editarEncuestasAction($request)
    {
        $id = explode('/', $request)[3];

        $descripcionAntigua = end(explode('/', $request));
        $data = array($descripcionAntigua);

        $encuestas = Encuestas::getInstancia();

        if (isset($_POST["editar"])) {
            $encuestas->setId($id);
            $encuestas->setDescripcion($_POST["descripcion"]);
            $encuestas->edit();
            header('location:' . DIRBASEURL . '/encuestas');
        } else {
            $this->renderHTML('..\view\encuestas_edit_view.php', $data);
        }
    }

    public function annadirEncuestasAction()
    {
        if (isset($_POST["crear"])) {
            $encuestas = Encuestas::getInstancia();

            header('location:' . DIRBASEURL . '/encuestas');
        } else {
            $this->renderHTML('..\view\encuestas_add_view.php');
        }
    }
}
