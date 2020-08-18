<?php

require_once '../dao/AvisoDAO.php';
require_once '../dto/AvisoDTO.php';

$id = $_POST["id"];
$aviso = $_POST["aviso"];

$avisoDTO = new AvisoDTO($id,$aviso);
$avisoDAO = new AvisoDAO();

$retorno = $avisoDAO->alterarAvisoByID($avisoDTO);

if($retorno){
    $msg="Aviso Alterado com sucesso!";
    header("location:../view/formAlterarAviso.php?msg=$msg&id=$id");
}

