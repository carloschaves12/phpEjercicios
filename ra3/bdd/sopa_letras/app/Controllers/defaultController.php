<?php

namespace App\Controllers;

use App\Models\Palabra;

require_once('..\app\Config\constantes.php');


class defaultController extends BaseController
{

    public function palabraAction()
    {
        $data = array();
        $palabra = Palabra::getInstancia();

        if (isset($_POST['buscar'])) {
            $data = $palabra->getByNombre($_POST['palabra']);
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

        if(isset($_POST["añadir"])) {
            $palabra->set([$_POST["palabra"]]);
            header('location:' . DIRBASEURL . '/palabra');
        } else {
            $this->renderHTML('..\view\palabra_add_view.php', $data);
        }
    }

    public function borrarPalabraAction($id)
    {
        $palabra = Palabra::getInstancia();

        $palabra->delete([$id]);
        header('location:' . DIRBASEURL . '/palabra');
    }

    public function editarPalabraAction($id, $palabraAntigua)
    {
        $data = array($palabraAntigua);
        $palabra = Palabra::getInstancia();

        if(isset($_POST["editar"])) {
            $palabra->edit([$_POST["palabra"], $id]);
            header('location:' . DIRBASEURL . '/palabra');
        } else {
            $this->renderHTML('..\view\palabra_edit_view.php', $data);
        }
    }
}
