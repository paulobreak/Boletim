<?php

require_once '../dao/AvisoDAO.php';
$idAviso = $_GET["id"];

$avisoDAO = new AvisoDAO();
$retorno = $avisoDAO->excluirAvisoById($idAviso);

if($retorno){
    $msg = "Aviso excluído com sucesso!";
    header("location:../view/avisosCadastrados.php?msg=$msg");
}

