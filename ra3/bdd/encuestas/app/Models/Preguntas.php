<?php

namespace App\Models;
require_once("DBAbstractModel.php");

class Preguntas extends DBAbstractModel
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
    private $descripcion;
    private $opciones = array();

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function set(){
        $this->query = "INSERT INTO preguntas(descripcion) VALUES(:descripcion)";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->get_results_from_query();
    }

    public function get()
    {        
        $this->query = "SELECT id, descripcion FROM preguntas";
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function delete() {
        $this->query = "DELETE FROM preguntas WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function edit() {
        $this->query = "UPDATE preguntas SET descripcion=:descripcion WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function getById() {
        $this->query = "SELECT descripcion FROM preguntas WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $pregunta = $this->rows;
        $this->query = "SELECT * FROM opciones WHERE idPregunta=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        $opciones = $this->rows;
        $resultado["pregunta"] = $pregunta;
        $resultado["opciones"] = $opciones;
        return $resultado;
    }

    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
    
}