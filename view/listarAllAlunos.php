<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/fontawesome.min.css">
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/confirm.css" rel="stylesheet">
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
    <h2>Lista de Alunos</h2>
    <?php
        if(!empty($mensagem)){
            echo "<h4>$mensagem</h4>";
        }
    ?>

    <table class="table table-bordered table-striped table-responsive-sm">
        <thead class="table-header">
          <tr>
            <th scope="col">Matricula</th>
            <th scope="col">Nome</th>
            <th scope="col">Série</th>
            <th scope="col">Turma</th>
            <th scope="col">Turno</th>
            <th scope="col">Opções</th>
          </tr>
        </thead>
        <?php
            foreach ($alunos as $aluno){
        ?>
        <tbody>
            <tr>
                <td><?=$aluno["matricula"]?></td>
                <td><?=$aluno["nome"]?></td>
                <td><?=$aluno["serie"]?>º Ano</td>
                <td><?=$aluno["turma"]?></td>
                <td><?=$aluno["turno"]?></td>
                <td><a class="btn btn-success" href="../view/formAlterarAluno.php?id=<?=$aluno["id_aluno"]?>"/>Alterar</a>
                    <a class="btn btn-danger"
                    href="#myModal" data-toggle="modal"/>Excluir</a>
                </td>
            </tr>         
        </tbody>
        <?php
                }
        ?>
      </table>
    <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir aluno?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" id="confirmar" href="../controller/excluirAlunoByIdController.php?id=<?=$aluno["id_aluno"]?>">Confirmar</a>
                </div>
            </div>
	</div>
    </div>     
    <script src="../jquery/jquery.slim.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
