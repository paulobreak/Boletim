<?php

require_once '../dto/ProfessorDTO.php';
require_once '../dao/ProfessorDAO.php';

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$sexo = $_POST["sexo"];
$telefone = $_POST["telefone"];
$dt_nascimento = $_POST["dt_nascimento"];
$email = $_POST["email"];
$disciplina = $_POST["nome_disciplina"];
$turno = $_POST["turno"];
$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);
$senhaCorfirm = md5($_POST["senha_confirm"]);

$professor = new ProfessorDTO(0,$nome,$cpf,$sexo,$telefone,$dt_nascimento,
        $email,$disciplina,$turno,$usuario,$senha);
$professorDAO = new ProfessorDAO();

$professorExiste = $professorDAO->verificarProfessor($usuario);

if($senha == $senhaCorfirm){
    if($professorExiste){
        $msg = "Esta usuário já esta cadastrardo!";
    header("location:../view/formCadastrarProfessor.php?msg=$msg");
    }else{
        $retorno = $professorDAO->inserir($professor);
        
        if($retorno){
            $msg = "Cadastro realizado com sucesso!";
            header("location:../view/formCadastrarProfessor.php?msg=$msg");     
        }
    }
}else{
    $msg = "Senhas diferentes!";
    header("location:../view/formCadastrarProfessor.php?msg=$msg"); 
}

 
