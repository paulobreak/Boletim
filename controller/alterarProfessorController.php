<?php
require_once '../dao/ProfessorDAO.php';
require_once '../dto/ProfessorDTO.php';

$id = $_POST["id"];
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

$professorDTO = new ProfessorDTO($id,$nome,$cpf,$sexo,$telefone,$dt_nascimento,
        $email,$disciplina,$turno,$usuario,$senha);
$professorDAO = new ProfessorDAO();

$retorno = $professorDAO->alterarProfessorByID($professorDTO);

if($retorno){
    $msg="Professor alterado com sucesso!";
   header("location:../view/formAlterarProfessor.php?msg=$msg&id=$id");
}



