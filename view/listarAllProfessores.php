<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/fontawesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
<link href="../css/confirm.css" rel="stylesheet">
  <title>Boletim</title>

</head>
<body>
  <?php
        require_once '../dao/ProfessorDAO.php';
        $professorDAO = new ProfessorDAO();
        $professores = $professorDAO->getAllProfessores();
        $mensagem="";
        if(isset($_GET["msg"])){
            $mensagem=$_GET["msg"];
        }
    ?>
    <h2>Lista de Professores</h2>
    <?php
        if(!empty($mensagem)){
            echo "<h4>$mensagem</h4>";
        }
    ?>
    <table class="table table-bordered table-striped table-responsive-sm">
        <thead class="table-header">
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Disciplina</th>
            <th scope="col">Turno</th>
            <th scope="col">Opções</th>
          </tr>
        </thead>
       <?php
            foreach ($professores as $professor) {
        ?>
        <tbody>
            <tr>
                <td><?=$professor["nome"]?></td>
                <td><?=$professor["nome_disciplina"]?></td>
                <td><?=$professor["turno"]?></td>
                <td><a class="btn btn-success" href="../view/formAlterarProfessor.php?id=<?=$professor["id_prof"]?>"/>Alterar</a>
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
                    <p>Tem certeza que deseja excluir professor?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" id="confirmar" href="../controller/excluirProfessorByIdController.php?id=<?=$professor["id_prof"]?>">Confirmar</a>
                </div>
            </div>
	</div>
    </div> 
    <script src="../jquery/jquery.slim.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
