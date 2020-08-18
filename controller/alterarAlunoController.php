<?php

require_once '../dao/AlunoDAO.php';
require_once '../dto/AlunoDTO.php';

$id = $_POST["id"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$sexo = $_POST["sexo"];
$telefone = $_POST["telefone"];
$dt_nascimento = $_POST["dt_nascimento"];
$turma = $_POST["turma"];
$turno = $_POST["turno"];
$serie = $_POST["serie"];
$matricula = $_POST["matricula"];
$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);
$senhaCorfirm = md5($_POST["senha_confirm"]);

$alunoDTO = new AlunoDTO($id,$nome,$cpf,$sexo,$telefone,$dt_nascimento,
        $turma,$turno,$serie,$matricula,$usuario,$senha);
$alunoDAO = new AlunoDAO();

$retorno = $alunoDAO->alterarAlunoByID($alunoDTO);

if($retorno){
    $msg="Aluno alterado com sucesso!";
    header("location:../view/formAlterarAluno.php?msg=$msg&id=$id");
}