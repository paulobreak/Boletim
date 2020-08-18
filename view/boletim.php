<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <title>Boletim</title>

</head>
<body>
    <?php
        require_once '../dao/NotaDAO.php';
        session_start();
        $idaluno =  $_SESSION["idaluno"] ;
        $notaDAO = new NotaDAO();
        $notas = $notaDAO->getAllNotasByAluno($idaluno);  
        $mensagem="";
            if(isset($_GET["msg"])){
                $mensagem= $_GET["msg"];
        }
    ?>
    <table class="table table-bordered table-striped table-responsive-sm">
        <thead class="table-header">
          <tr>
            <th scope="col">Materias</th>
            <th scope="col">1º Semestre</th>
            <th scope="col">2º Semestre</th>
            <th scope="col">Média</th>
            <th scope="col">Faltas</th>
            <th scope="col">Situação</th>
          </tr>
        </thead>
        <tbody>
            <?php
                foreach ($notas as $nota){
            ?>
            <tr>
            <th scope="row"><?=$nota["Nome_disciplina"]?></th>
                <td><?=$nota["Nota1"]?></td>
                <td><?=$nota["Nota2"]?></td>
                <td><?=$media=($nota["Nota1"]+$nota["Nota2"])/2?></td>
                <td></td>
                <td>Cursando</td>
            </tr>
            <?php
                }
            ?>
        </tbody>
      </table>
</body>
</html>
