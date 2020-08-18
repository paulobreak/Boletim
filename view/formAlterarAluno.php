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
    <title>+Boletim</title>

</head>

<body>
    <?php
        require_once '../dao/AlunoDAO.php';
        $msg="";
        if(isset($_GET["msg"])){
            $msg = $_GET["msg"];
        }
        $id = $_GET["id"];
        $alunoDAO = new AlunoDAO();
        $aluno = $alunoDAO->getAlunosById($id);
        
    ?>
    <h2>Formulário Alteração de Aluno</h2>
    <h5><?=$msg?></h5>
<div class="d-flex" id="wrapper">
    <form action="../controller/alterarAlunoController.php" method="POST">
        <input type="hidden" name="id" value="<?=$aluno['Id_aluno']?>"/>
    <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?=$aluno['Nome']?>">
    </div>
        

        
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>CPF</label>
            <input type="text" class="form-control" name="cpf" placeholder="CPF" value="<?=$aluno['CPF']?>">
        </div>

        <div class="form-group col-md-6">
            <label>Sexo</label>
              <select class="custom-select" name="sexo">
              <option selected>Escolha</option>
              <option value="masculino"
                      <?php
                        if($aluno["Sexo"]=="masculino"){
                            echo"selected";
                        }
                        ?>
                      >Masculino</option>
              <option value="feminino"
                  <?php
                        if($aluno["Sexo"]=="feminino"){
                            echo"selected";
                        }
                        ?>
                      >Feminino</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>Telefone</label>
            <input type="tel" class="form-control" name="telefone" placeholder="Telefone" value="<?=$aluno['Telefone']?>">
        </div>
        <div class="form-group col-md-6">
            <label>Data de Nascimento</label>
            <input type="date" class="form-control" name="dt_nascimento" value="<?=$aluno['Data_Nascimento']?>">
        </div>
    </div>
        
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Turma</label>
            <input type="text" class="form-control" name="turma" placeholder="Turma" value="<?=$aluno['Turma']?>">
        </div>

    <div class="form-group col-md-6">
        <label>Turno</label>
          <select class="custom-select" name="turno">
          <option selected>Escolha</option>
          <option value="Matutino"
              <?php
                    if($aluno["Turno"]=="Matutino"){
                        echo"selected";
                    }
                    ?>
                  >Matutino</option>
          <option value="Vespertino"
              <?php
                    if($aluno["Turno"]=="Vespertino"){
                        echo"selected";
                    }
                    ?>
                  >Vespertino</option>
          <option value="Noturno"
              <?php
                    if($aluno["Turno"]=="Noturno"){
                        echo"selected";
                    }
                    ?>
                  >Noturno</option>
        </select>
    </div>
        <div class="form-group col-md-6">
            <label>Série</label>
            <input type="text" class="form-control" name="serie" placeholder="Série" value="<?=$aluno['Serie']?>">
        </div>
        <div class="form-group col-md-6">
            <label>Matricula</label>
            <input type="number" class="form-control" name="matricula" placeholder="Matricula" value="<?=$aluno['matricula']?>">
        </div>
    </div>
        
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Login</label>
            <input type="text" class="form-control" name="usuario" placeholder="Login" value="<?=$aluno['usuario']?>">
        </div>
        <div class="form-group col-md-6">
            <label>Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha" value="">
        </div>
        <div class="form-group col-md-6">
            <label>Confirme a Senha</label>
            <input type="password" class="form-control" name="senha_confirm" placeholder="Senha">
        </div>
    </div>

        <a class="btn btn-primary" href="#myModal" data-toggle="modal">Editar</a>
 </div>   
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
                    <p>Deseja confirmar a edição dos dados?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="confirmar">Confirmar</button>
                </div>
            </div>
	</div>
    </div>
	
</form>
    
        <script src="../jquery/jquery.slim.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
