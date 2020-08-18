<?php

require_once '../dao/ProfessorDAO.php';
$idProfessor = $_GET["id"];

$professorDAO = new ProfessorDAO();
$retorno = $professorDAO->excluirById($idProfessor);

if($retorno){
    $msg = "Professor excluído com sucesso!";
    header("location:../view/listarAllProfessores.php?msg=$msg");
}

