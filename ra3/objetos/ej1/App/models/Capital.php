<?php
namespace App\models;

class Capital {

    private $nombre;
    private $posicionIni;
    private $posicionFin;

    public function __construct($nombre, $posicionIni, $posicionFin) {
        $this->nombre = $nombre;
        $this->posicionIni = $posicionIni;
        $this->posicionFin = $posicionFin;
    }

    public function nombreCapital() {
        return $this->nombre;
    }

    public function posicionIni() {
        return $this->posicionIni;
    }

    public function posicionFin() {
        return $this->posicionFin;
    }
}