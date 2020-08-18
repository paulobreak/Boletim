<?php

require_once '../dto/AvisoDTO.php';
require_once '../dao/AvisoDAO.php';

$aviso = $_POST["aviso"];

$aviso = new AvisoDTO(0,$aviso);
$avisoDAO = new AvisoDAO();

$retorno = $avisoDAO->inserir($aviso);

if($retorno){
    $msg = "Aviso cadastrado com sucesso!";
    header("location:../view/cadastrarAviso.php?msg=$msg");
}
