<?php

namespace App\Models;
require_once("DBAbstractModel.php");

class User extends DBAbstractModel
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
    private $nombre;
    private $user;
    private $psw;
    private $email;
    private $perfil;
    private $bloqueado;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setPsw($psw)
    {
        $this->psw = $psw;
    }

    public function getPsw()
    {
        return $this->psw;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function setBloqueado($bloqueado)
    {
        $this->bloqueado = $bloqueado;
    }

    public function getBloqueado()
    {
        return $this->bloqueado;
    }

    public function set(){
        $this->query = "INSERT INTO usuarios(nombre, user, psw, email, perfil, bloqueado) VALUES(:nombre, :user, :psw, :email, :perfil, :bloqueado)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['user'] = $this->user;
        $this->parametros['psw'] = $this->psw;
        $this->parametros['email'] = $this->email;
        $this->parametros['perfil'] = $this->perfil;
        $this->parametros['bloqueado'] = $this->bloqueado;
        $this->get_results_from_query();
    }

    public function get()
    {        
        $this->query = "SELECT id, user, psw, perfil, bloqueado FROM usuarios WHERE user=:user AND psw=:psw";
        $this->parametros['user'] = $this->user;
        $this->parametros['psw'] = $this->psw;
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function delete() {
        $this->query = "DELETE FROM usuarios WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function edit() {
        $this->query = "UPDATE usuarios SET nombre=:nombre, user=:user, psw=:psw, email=:email, perfil=:perfil, bloqueado=:bloqueado WHERE id=:id";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['user'] = $this->user;
        $this->parametros['psw'] = $this->psw;
        $this->parametros['email'] = $this->email;
        $this->parametros['perfil'] = $this->perfil;
        $this->parametros['bloqueado'] = $this->bloqueado;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function editBloqueado() {
        $this->query = "UPDATE usuarios SET bloqueado=1 WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function getAll() {
        $this->query = "SELECT id, user, perfil, bloqueado FROM usuarios WHERE bloqueado=0";
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }
    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
    
}