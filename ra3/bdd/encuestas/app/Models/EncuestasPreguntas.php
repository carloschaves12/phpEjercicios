<?php

namespace App\Models;
require_once("DBAbstractModel.php");

class EncuestasPreguntas extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $idPregunta;
    private $idEncuesta;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIdPregunta($idPregunta)
    {
        $this->idPregunta = $idPregunta;
    }

    public function getidPregunta()
    {
        return $this->idPregunta;
    }

    public function setIdEncuesta($idEncuesta)
    {
        $this->idEncuesta = $idEncuesta;
    }

    public function getIdEncuesta()
    {
        return $this->idEncuesta;
    }

    public function set(){
        $this->query = "INSERT INTO encuestas_preguntas(idPregunta, idEncuesta) VALUES(:idPregunta, :idEncuesta)";
        $this->parametros['idPregunta'] = $this->idPregunta;
        $this->parametros['idEncuesta'] = $this->idEncuesta;
        $this->get_results_from_query();
    }

    public function get()
    {        
    }

    public function delete() {
    }

    public function edit() {
    }

    public function getById() {
        $this->query = "SELECT id, idPregunta, idEncuesta FROM encuestas_preguntas WHERE idEncuesta=:idEncuesta";
        $this->parametros['idEncuesta'] = $this->idEncuesta;
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
    
}