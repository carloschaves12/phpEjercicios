<?php

namespace App\Models;
require_once("DBAbstractModel.php");

class Opciones extends DBAbstractModel
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
    private $opciones;

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

    public function getIdPregunta()
    {
        return $this->idPregunta;
    }

    public function setOpciones($opciones)
    {
        $this->opciones = $opciones;
    }

    public function getOpciones()
    {
        return $this->opciones;
    }

    public function set(){
        $this->query = "INSERT INTO opciones(idPreguntas, opciones) VALUES(:idPreguntas, :opciones)";
        $this->parametros['idPreguntas'] = $this->descripcion;
        $this->parametros['opciones'] = $this->fecha;
        $this->get_results_from_query();
    }

    public function get()
    {        
        $this->query = "SELECT id, idPregunta, opciones FROM opciones";
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function delete() {
        $this->query = "DELETE FROM opciones WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function edit() {
        $this->query = "UPDATE opciones SET opciones=:opciones WHERE id=:id";
        $this->parametros['opciones'] = $this->id;
        $this->get_results_from_query();
    }

    public function getByIdPregunta() {
        $this->query = "SELECT id, idPregunta, opciones FROM opciones WHERE idPregunta=:idPregunta";
        $this->parametros['idPregunta'] = $this->idPregunta;
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
    
}