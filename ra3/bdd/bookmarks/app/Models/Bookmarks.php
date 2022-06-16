<?php

namespace App\Models;
require_once("DBAbstractModel.php");

class Bookmarks extends DBAbstractModel
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
    private $bm_url;
    private $descripcion;
    private $idUsuario;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUrl($bm_url)
    {
        $this->bm_url = $bm_url;
    }

    public function getUrl()
    {
        return $this->bm_url;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function set() {
        $this->query = "INSERT INTO bookmarks(bm_url, descripcion, idUsuario)
                        VALUES(:bm_url, :descripcion, :idUsuario)";
        $this->parametros['bm_url'] = $this->bm_url;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['idUsuario'] = $this->idUsuario;
        $this->get_results_from_query();
    }

    public function get() {
        $this->query = "SELECT id, bm_url, descripcion, idUsuario FROM bookmarks";
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function delete() {
        $this->query = "DELETE FROM bookmarks WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function edit () {
        $this->query = "UPDATE bookmarks SET bm_url=:bm_url, descripcion=:descripcion WHERE id=:id";
        $this->parametros['bm_url'] = $this->bm_url;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['idUsuario'] = $this->idUsuario;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function getBookmarksByUrl() {
        $this->query = "SELECT id, bm_url, descripcion, idUsuario FROM bookmarks WHERE bm_url=:bm_url";
        $this->parametros['bm_url'] = $this->bm_url;
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function getBookmarksByUserId() {
        $this->query = "SELECT id, bm_url, descripcion FROM bookmarks WHERE idUsuario=:idUsuario";
        $this->parametros['idUsuario'] = $this->idUsuario;
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }
    
    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
}