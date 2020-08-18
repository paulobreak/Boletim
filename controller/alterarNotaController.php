<?php

require_once '../dao/NotaDAO.php';
require_once '../dto/NotaDTO.php';

$nota1 = ["nota1"];
$nota2 = ["nota2"];

$notaDTO = new NotaDTO($nota1,$nota2);
$NotaDAO = new NotaDAO();

$retorno = $NotaDAO->

