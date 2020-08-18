<?php

require_once '../dao/AlunoDAO.php';
$idAluno = $_GET["id"];

$alunoDAO = new AlunoDAO(); 
$retorno = $alunoDAO->excluirById($idAluno);   

if($retorno){
    $msg = "Aluno excluído com sucesso!";
    header("location:../view/listarAllAlunos.php?msg=$msg");
}

