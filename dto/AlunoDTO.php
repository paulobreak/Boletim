<?php

class AlunoDTO{
    private $idAluno;
    private $nome;
    private $cpf;
    private $sexo;
    private $telefone;
    private $dt_nascimento;
    private $turma;
    private $turno;
    private $serie;
    private $matricula;
    private $usuario;
    private $senha;
    
    
    public function __construct($id,$nome,$cpf,$sexo,$telefone,$dt_nascimento,$turma,$turno,$serie,$matricula,$usuario,$senha) {

    $this->idAluno = $id;
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->sexo = $sexo;
    $this->telefone = $telefone;
    $this->dt_nascimento = $dt_nascimento;
    $this->turma = $turma;
    $this->turno = $turno;
    $this->serie = $serie;
    $this->matricula = $matricula;
    $this->usuario = $usuario;
    $this->senha = $senha;
    
    }
    function getIdAluno() {
        return $this->idAluno;
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

    function getTurma() {
        return $this->turma;
    }

    function getTurno() {
        return $this->turno;
    }

    function getSerie() {
        return $this->serie;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
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

    function setTurma($turma) {
        $this->turma = $turma;
    }

    function setTurno($turno) {
        $this->turno = $turno;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

}

