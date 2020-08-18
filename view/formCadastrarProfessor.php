<!DOCTYPE html>
<html lang="pt">
<head>

    <meta charset="utf-8">
    
    <script src="../jquery/jquery.slim.js"></script>
    <script src="../jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>+Boletim</title>

</head>

<body>
    <?php
        $msg="";
        if(isset($_GET["msg"])){
            $msg = $_GET["msg"];
        }
    ?>
    
<div class="d-flex" id="wrapper">
    <form action="../controller/cadastrarProfessorController.php" method="POST">
        <h2>Formulário de Cadastro de Professores</h2>
        <h5><?=$msg?></h5>
    <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" placeholder="Nome" name="nome">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>CPF</label>
            <input type="text" class="form-control" name="cpf" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00')">
        </div>

        <div class="form-group col-md-6">
            <label>Sexo</label>
              <select class="custom-select" name="sexo">
              <option selected>Escolha</option>
              <option value="masculino">Masculino</option>
              <option value="feminino">Feminino</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>Telefone</label>
            <input type="tel" id="tel" class="form-control" name="telefone" placeholder="Telefone" onkeypress="$(this).mask('(00) 0000-00009')">
        </div>
        
        <div class="form-group col-md-6">
            <label>Data de Nascimento</label>
            <input type="date" class="form-control" name="dt_nascimento">
        </div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control"placeholder="Email" name="email">
    </div>
        
    <div class="form-row">
    <div class="form-group col-md-6">
        <label>Disciplina</label>
        <input type="text" class="form-control" name="nome_disciplina" placeholder="Português/Matemática...">
    </div>
        
    <div class="form-group col-md-6">
            <label>Turno</label>
              <select class="custom-select" name="turno">
              <option selected>Escolha</option>
              <option value="Matutino">Matutino</option>
              <option value="Vespertino">Vespertino</option>
              <option value="Noturno">Noturno</option>
            </select>
    </div>
        

    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Login</label>
            <input type="text" class="form-control" name="usuario" placeholder="Login">
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
    <button type="submit" class="btn btn-primary">Cadastrar</button>
	
</form>
</div>
</body>
</html>