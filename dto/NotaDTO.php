<?php

class NotaDTO{
    private $nota1;
    private $nota2;
    
    public function __construct($nota1,$nota2) {
        $this->nota1 = $nota1;
        $this->nota1 = $nota2;
    }
    function getNota1() {
        return $this->nota1;
    }

    function getNota2() {
        return $this->nota2;
    }

    function setNota1($nota1) {
        $this->nota1 = $nota1;
    }

    function setNota2($nota2) {
        $this->nota2 = $nota2;
    }


}
