<?php

namespace App\Models;
require_once("DBAbstractModel.php");

class Encuestas extends DBAbstractModel
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
    private $fecha;

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

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function set(){
        $this->query = "INSERT INTO encuestas(descripcion, fecha) VALUES(:descripcion, :fecha)";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['fecha'] = $this->fecha;
        $this->get_results_from_query();
    }

    public function get()
    {        
        $this->query = "SELECT id, descripcion, fecha FROM encuestas";
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function delete() {
        $this->query = "DELETE FROM encuestas WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function edit() {
        $this->query = "UPDATE encuestas SET descripcion=:descripcion WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->parametros['descripcion'] = $this->descripcion   ;

        $this->get_results_from_query();
    }

    public function getByDescripcion() {
        $this->query = "SELECT id, descripcion, fecha FROM encuestas WHERE descripcion=:descripcion";
        $this->parametros['descripcion'] = $this->descripcion;
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function getPregunta() {
        $this->query = "SELECT idPregunta, id FROM encuestas_preguntas WHERE idEncuesta=:idEncuesta";
        $this->parametros['idEncuesta'] = $this->id;
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
    
}