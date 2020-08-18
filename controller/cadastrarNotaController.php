<?php
require_once '../dao/ProfessorDAO.php';
require_once '../dto/NotaDTO.php';
require_once '../dao/NotaDAO.php';
session_start();
$nota1 = $_POST["nota1"];
$nota2 = $_POST["nota2"];
$matricula = $_POST["matricula"];
$idAluno = $_POST["id_aluno"];
$tamanho = count($idAluno);
echo "<pre>";
print_r($idAluno);
echo "</pre>";
$usuario = $_SESSION["usuario"];
$professorDAO = new ProfessorDAO();
$professor = $professorDAO->getProfessoresByUsuario($usuario);

$notaDAO = new NotaDAO();
$retorno=0;
for($x=0;$x<$tamanho;$x++){
    
    $nota = new NotaDTO($nota1[$x],$nota2[$x],$matricula[$x],$professor["Id_Prof"]);


   $retorno = $notaDAO->inserir($nota1[$x],$nota2[$x],$idAluno[$x],$professor["Id_Prof"]);   
}



if($retorno){
    $msg = "Nota cadastrada com sucesso!";
    header("location:../view/formCadastrarNota.php?msg=$msg");
}




