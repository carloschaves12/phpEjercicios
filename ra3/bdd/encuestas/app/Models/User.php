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
    private $usuario;
    private $password;
    private $perfil;

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

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
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

    public function set(){
        $this->query = "INSERT INTO usuarios(nombre, usuario, password, perfil) VALUES(:nombre, :usuario, :password, :perfil)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['password'] = $this->password;
        $this->parametros['perfil'] = $this->perfil;
        $this->get_results_from_query();
    }

    public function get()
    {        
        $this->query = "SELECT id, usuario, password, perfil FROM usuarios WHERE usuario=:usuario AND password=:password";
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['password'] = $this->password;
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
        $this->query = "UPDATE usuarios SET nombre=:nombre, usuario=:usuario, password=:password, perfil=:perfil WHERE id=:id";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['password'] = $this->password;
        $this->parametros['perfil'] = $this->perfil;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
    
}