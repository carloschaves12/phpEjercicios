<?php

namespace App\Models;
require_once("DBAbstractModel.php");

class Respuestas extends DBAbstractModel
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
    private $idEncuestaPregunta;
    private $valor;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIdEncuestaPregunta($idEncuestaPregunta)
    {
        $this->idEncuestaPregunta = $idEncuestaPregunta;
    }

    public function getidEncuestaPregunta()
    {
        return $this->idEncuestaPregunta;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function set(){
        $this->query = "INSERT INTO respuestas(idEncuestaPregunta, valor) VALUES(:idEncuestaPregunta, :valor)";
        $this->parametros['idEncuestaPregunta'] = $this->idEncuestaPregunta;
        $this->parametros['valor'] = $this->valor;
        $this->get_results_from_query();
    }

    public function get()
    {        
    }

    public function delete() {
       
    }

    public function edit() {
    }

    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
    
}