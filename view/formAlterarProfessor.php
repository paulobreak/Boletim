<!DOCTYPE html>
<html lang="pt">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/fontawesome.min.css">
    <script src="../jquery/jquery.slim.js"></script>
    <script src="../jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/confirm.css" rel="stylesheet">
    <title>+Boletim</title>

</head>

<body>
    <?php
        require_once '../dao/ProfessorDAO.php';
        $msg="";
        if(isset($_GET["msg"])){
            $msg = $_GET["msg"];
        }
        $id = $_GET["id"];
        $professorDAO = new ProfessorDAO();
        $professor = $professorDAO->getProfessoresById($id);
        
    ?>
    <h2>Formulário Alteração de Professor</h2>
    <h5><?=$msg?></h5>
<div class="d-flex" id="wrapper">
    <form action="../controller/alterarProfessorController.php" method="POST">
        <input type="hidden" name="id" value="<?=$professor['Id_Prof']?>"/>
    <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" placeholder="Nome" name="nome" 
               value="<?=$professor['Nome']?>">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>CPF</label>
            <input type="text" class="form-control" name="cpf" placeholder="CPF" 
                   value="<?=$professor['CPF']?>" onkeypress="$(this).mask('000.000.000-000')">
        </div>

        <div class="form-group col-md-6">
            <label>Sexo</label>
              <select class="custom-select" name="sexo">
              <option selected>Escolha</option>
              <option value="masculino"
                      <?php
                        if($professor["Sexo"]=="masculino"){
                            echo"selected";
                        }
                        ?>
                      >Masculino</option>
              <option value="feminino"
                  <?php
                        if($professor["Sexo"]=="feminino"){
                            echo"selected";
                        }
                        ?>
                      >Feminino</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>Telefone</label>
            <input type="tel" class="form-control" name="telefone" 
                   placeholder="Telefone" value="<?=$professor['Telefone']?>"
                   onkeypress="$(this).mask('(00) 0000-00009')">
        </div>
        <div class="form-group col-md-6">
            <label>Data de Nascimento</label>
            <input type="date" class="form-control" name="dt_nascimento" value="<?=$professor['Data_Nascimento']?>">
        </div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control"placeholder="Email" name="email" value="<?=$professor['email']?>">
    </div>
        
    <div class="form-row">
    <div class="form-group col-md-6">
        <label>Disciplina</label>
        <input type="text" class="form-control" name="nome_disciplina" placeholder="Português/Matemática..." value="<?=$professor['Nome_disciplina']?>">
    </div>
        
    <div class="form-group col-md-6">
        <label>Turno</label>
          <select class="custom-select" name="turno">
          <option selected>Escolha</option>
          <option value="Matutino"
              <?php
                    if($professor["Turno"]=="Matutino"){
                        echo"selected";
                    }
                    ?>
                  >Matutino</option>
          <option value="Vespertino"
              <?php
                    if($professor["Turno"]=="Vespertino"){
                        echo"selected";
                    }
                    ?>
                  >Vespertino</option>
          <option value="Noturno"
              <?php
                    if($professor["Turno"]=="Noturno"){
                        echo"selected";
                    }
                    ?>
                  >Noturno</option>
        </select>
    </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Login</label>
            <input type="text" class="form-control" name="usuario" placeholder="Login" value="<?=$professor['usuario']?>">
        </div>
        <div class="form-group col-md-6">
            <label>Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha">
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
