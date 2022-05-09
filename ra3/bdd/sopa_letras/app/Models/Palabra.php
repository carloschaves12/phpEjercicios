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
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO palabras(palabra)
                        VALUES(:palabra)";
        $this->parametros['palabra'] = $palabra;
        $this->get_results_from_query();
        //$lastId = $this->lastInsert();
        //echo $lastId;
        //echo $this->mensaje = 'palabra agregada correctamente';
    }

    public function get($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "SELECT id, palabra FROM palabras WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $resultado = $this->rows;
        foreach ($resultado as $value) {
            echo $value['id'] . ", " . $value['palabra'] . "</br>";
        }
        //echo $this->mensaje = 'palabra obtenida correctamente';
    }

    public function delete($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "DELETE FROM palabras WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        //echo $this->mensaje = 'palabra eliminada correctamente';
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE palabras SET palabra=:palabra WHERE id=:id";
        $this->parametros['palabra'] = $palabra;
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        //echo $this->mensaje = 'palabra actulizada correctamente';
    }


    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
}
