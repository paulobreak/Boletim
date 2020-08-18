<?php

require_once '../dto/AlunoDTO.php';
require_once '../dao/AlunoDAO.php';

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

$aluno = new AlunoDTO(0,$nome,$cpf,$sexo,$telefone,$dt_nascimento,
        $turma,$turno,$serie,$matricula,$usuario,$senha);
$alunoDAO = new AlunoDAO();

$alunoExiste = $alunoDAO->verificarAluno($usuario);

if($senha == $senhaCorfirm){
    if($alunoExiste){
        $msg = "Esta usuário já esta cadastrardo!";
    header("location:../view/formCadastrarAluno.php?msg=$msg");
    }else{
        $retorno = $alunoDAO->inserir($aluno);
        
        if($retorno){
            $msg = "Cadastro realizado com sucesso!";
            header("location:../view/formCadastrarAluno.php?msg=$msg");     
        }
    }
}else{
    $msg = "Senhas diferentes!";
    header("location:../view/formCadastrarAluno.php?msg=$msg");
}