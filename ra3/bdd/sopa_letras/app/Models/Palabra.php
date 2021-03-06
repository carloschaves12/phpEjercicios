<?php

namespace App\Models;
require_once("DBAbstractModel.php");

class Palabra extends DBAbstractModel
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
    private $palabra;

    public function setNombre($palabra)
    {
        $this->palabra = $palabra;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function set()
    {
        $this->query = "INSERT INTO palabras(palabra)
                        VALUES(:palabra)";
        $this->parametros['palabra'] = $this->palabra;
        $this->get_results_from_query();
        //$lastId = $this->lastInsert();
        //echo $lastId;
        //echo $this->mensaje = 'palabra agregada correctamente';
    }

    public function get()
    {
        $this->query = "SELECT id, palabra FROM palabras";
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function delete()
    {
        $this->query = "DELETE FROM palabras WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        //echo $this->mensaje = 'palabra eliminada correctamente';
    }

    public function edit()
    {
        $this->query = "UPDATE palabras SET palabra=:palabra WHERE id=:id";
        $this->parametros['palabra'] = $this->palabra;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
        //echo $this->mensaje = 'palabra correctamente';
    }

    public function getByNombre()
    {
        $this->query = "SELECT palabra, id FROM palabras WHERE palabra LIKE :palabra";
        $this->parametros['palabra'] = $this->palabra;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
}
