<?php

namespace App\Controllers;

use App\Models\Encuestas;
use App\Models\Preguntas;
use App\Models\EncuestasPreguntas;
use App\Models\Opciones;
use App\Models\Respuestas;

require_once('..\app\Config\constantes.php');


class EncuestasController extends BaseController
{

    public function encuestasAction()
    {
        $data = array();

        $encuestas = Encuestas::getInstancia();

        if ($_SESSION["usuario"]["perfil"] == "usuario") {
            if (isset($_POST["elegir"])) {
                header('location:' . DIRBASEURL . '/encuestas/mostrarEncuesta/' . $_POST["encuesta"]);
            } else {
                $data = $encuestas->get();
                $this->renderHTML('..\view\encuestas_usuario_view.php', $data);
            }
        } else if ($_SESSION["usuario"]["perfil"] == "admin") {
            if (isset($_POST["añadir"])) {
                header('location:' . DIRBASEURL . '/encuestas/crearEncuesta');
            } else {
                $data = $encuestas->get();
                $this->renderHTML('..\view\encuestas_admin_view.php', $data);
            }
        }
    }

    public function mostrarEncuestasAction($request)
    {
        $data = array();
        $id = end(explode('/', $request));

        $encuestasPregunta = EncuestasPreguntas::getInstancia();
        $encuestasPregunta->setIdEncuesta($id);
        $data["encuestasPregunta"] = $encuestasPregunta->getById();

        $preguntas = Preguntas::getInstancia();
        foreach ($data["encuestasPregunta"] as $encuestasPregunta) {
            $preguntas->setId($encuestasPregunta["idPregunta"]);
            $data["preguntas"][] = $preguntas->getById();
        }

        $opciones = Opciones::getInstancia();
        foreach ($data["preguntas"] as $preguntas) {
            $opciones->setIdPregunta($preguntas[0]["id"]);
            $data["opciones"][] = $opciones->getByIdPregunta();
        }

        if (isset($_POST["enviar"])) {
            $respuestas = Respuestas::getInstancia();
            $i = 0;
            foreach ($data["encuestasPregunta"] as $encuestasPregunta) {
                $respuestas->setIdEncuestaPregunta($encuestasPregunta["id"]);
                $respuestas->setValor($_POST["idPreguntas"][$i]);
                $respuestas->set();
                $i++;
            }
            header('location:' . DIRBASEURL . '/encuestas');
        }

        $this->renderHTML('..\view\mostrarEncuestas_view.php', $data);
    }

    public function crearEncuestasAction()
    {
        $data = array();
        $preguntas = Preguntas::getInstancia();
        $data["preguntas"] = $preguntas->get();
        if (isset($_POST["enviar"])) {
            $encuestas = Encuestas::getInstancia();
            $encuestas->setDescripcion($_POST["encuesta"]);
            $encuestas->setFecha(date("Y-m-d"));
            $encuestas->set();
            $idEncuesta = $encuestas->lastInsert();

            $encuestasPregunta = EncuestasPreguntas::getInstancia();
            foreach ($_POST["idPreguntas"] as $idPreguntas) {
                $encuestasPregunta->setIdPregunta($idPreguntas[0]);
                $encuestasPregunta->setIdEncuesta($idEncuesta);
                $encuestasPregunta->set();
            }
            header('location:' . DIRBASEURL . '/encuestas');
        } else {
            $this->renderHTML('..\view\crearEncuestas_view.php', $data);
        }
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

        $preguntas = Preguntas::getInstancia();
        $data["preguntas"] = $preguntas->get();

        if (isset($_POST["editar"])) {
            $encuestas->setId($id);
            $encuestas->setDescripcion($_POST["descripcion"]);
            $encuestas->edit();

            $encuestasPregunta = EncuestasPreguntas::getInstancia();
            foreach ($_POST["pregunta"] as $pregunta) {
                $encuestasPregunta->setIdPregunta($pregunta[0]);
                $encuestasPregunta->setIdEncuesta($id);
                $encuestasPregunta->set();
            }

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
