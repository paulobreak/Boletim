<?php

require_once '../dto/frequenciaDTO.php';
require_once '../dao/FrequenciaDAO.php';

$presente = $_POST["pesente"];
$ausente = $_POST["ausente"];

$frequencia = new FrequenciaDTO(0,$presente,$ausente);
$frequenciaDAO = new FrequenciaDAO();
