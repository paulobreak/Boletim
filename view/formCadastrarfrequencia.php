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
        require_once '../dao/AlunoDAO.php';
        $alunoDAO = new AlunoDAO();
        $alunos = $alunoDAO->getAllAlunos();
        $mensagem="";
        if(isset($_GET["msg"])){
            $mensagem=$_GET["msg"];
        }
    ?>
    <h2>Lista de Frequência</h2>
    <?php
        if(!empty($mensagem)){
            echo "<h4>$mensagem</h4>";
        }
    ?>
    <form action="../controller/cadastrarFrequenciaController.php" method="POST">
    <table class="table table-bordered table-striped table-responsive-sm">
        <thead class="table-header">
          <tr>
            <th scope="col">Matricula</th>
            <th scope="col">Nome</th>
            <th scope="col">Frequência</th>
          </tr>
        </thead>
        <?php
            foreach ($alunos as $aluno){
        ?>
        <tbody>
            <tr>
                <td><?=$aluno["matricula"]?></td>
                <td><?=$aluno["nome"]?></td>
                <td>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="presente" value="0">Presente
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ausente" value="1">Ausente
                        </label>
                    </div>
                </td>
            </tr>         
        </tbody>
        <?php
                }
        ?>
      </table>
    <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</body>
</html>
