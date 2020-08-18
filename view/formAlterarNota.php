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
        require_once '../dao/AlunoDAO.php';
        $alunoDAO = new AlunoDAO();
        $alunos = $alunoDAO->getAllAlunos();
        $mensagem="";
        if(isset($_GET["msg"])){
            $mensagem=$_GET["msg"];
        }
        $id = $_GET["id"];
        $NotaDAO = new NotaDAO();
        $nota = $notaDAO->getNotasById($id);
        
    ?>
    <h2>Notas</h2>
    <?php
        if(!empty($mensagem)){
            echo "<h4>$mensagem</h4>";
        }
    ?>
    <form action="../controller/alterarNotaController.php" method="POST">
    <table class="table table-bordered table-striped table-responsive-sm">
        <thead class="table-header">
        
          <tr>
            <th scope="col">Matricula</th>
            <th scope="col">Nome</th>
            <th scope="col">Nota 1º Semestre</th>
            <th scope="col">Nota 2º Semestre</th>
          </tr>
        </thead>
        <?php
        $cont=0;
            foreach ($alunos as $aluno){
        ?>
        <input type="hidden" name="matricula[<?=$cont?>]" value="<?=$aluno["matricula"]?>" >
        <input type="hidden" name="id_aluno[<?=$cont?>]" value="<?=$aluno["id_aluno"]?>" >
        <tbody>
            <tr>
                <td><?=$aluno["matricula"]?></td>
                <td><?=$aluno["nome"]?></td>
                <td>
                    <div class="row">
                        <div class="col">
                            <input value="<?=$nota["nota1"]?>" type="text" class="form-control" placeholder="Nota" name="nota1[<?=$cont?>]">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <input value="<?=$nota["nota2"]?>" type="text" class="form-control" placeholder="Nota" name="nota2[<?=$cont?>]">
                        </div>
                    </div>
                </td>
            </tr>         
        </tbody>
        <?php
        $cont++;
                }
        ?>
      </table>
    <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</body>
</html>