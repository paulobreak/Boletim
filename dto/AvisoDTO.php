<?php

class AvisoDTO{
    private $idAviso;
    private $aviso;
    
    public function __construct($id,$aviso) {
        
        $this->idAviso = $id;
        $this->aviso = $aviso;
    }
    
    function getIdAviso() {
        return $this->idAviso;
    }

    function getAviso() {
        return $this->aviso;
    }

    function setIdAviso($idAviso) {
        $this->idAviso = $idAviso;
    }

    function setAviso($aviso) {
        $this->aviso = $aviso;
    }



}

