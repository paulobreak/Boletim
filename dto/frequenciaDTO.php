<?php

class FrequenciaDTO{
    private $ausente;
    private $presente;
    
    public function __construct($ausente,$presente) {
        $this->ausente = $ausente;
        $this->presente = $presente;
    }
    function getAusente() {
        return $this->ausente;
    }

    function getPresente() {
        return $this->presente;
    }

    function setAusente($ausente) {
        $this->ausente = $ausente;
    }

    function setPresente($presente) {
        $this->presente = $presente;
    }


}

