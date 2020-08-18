<?php
class ProfessorDTO{ 
    private $idprofessor;
    private $nome;
    private $cpf;
    private $sexo;
    private $telefone;
    private $dt_nascimento;
    private $email;
    private $disciplina;
    private $turno;
    private $usuario;
    private $senha;
    
    public function __construct($id,$nome,$cpf,$sexo,$telefone,$dt_nascimento,$email,
            $disciplina,$turno,$usuario,$senha) {
        
        $this->idprofessor = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->telefone = $telefone;
        $this->dt_nascimento = $dt_nascimento;
        $this->email = $email;
        $this->disciplina = $disciplina;
        $this->turno = $turno;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }
    function getIdprofessor() {
        return $this->idprofessor;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getDt_nascimento() {
        return $this->dt_nascimento;
    }

    function getEmail() {
        return $this->email;
    }

    function getDisciplina() {
        return $this->disciplina;
    }

    function getTurno() {
        return $this->turno;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function setIdprofessor($idprofessor) {
        $this->idprofessor = $idprofessor;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setDt_nascimento($dt_nascimento) {
        $this->dt_nascimento = $dt_nascimento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }

    function setTurno($turno) {
        $this->turno = $turno;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

}

