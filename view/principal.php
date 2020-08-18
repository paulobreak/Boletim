<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../imagens/icon2.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../+boletim/css/style.css.css" rel="stylesheet">
  <title>+Boletim</title>
</head>

<body>
    <?php
        session_start();
        include 'validaLogin.php';
        ?>
    <?php
    switch ($_SESSION["perfil"]) {
        case "Administrador":
            include './menuAdministrador.php';
            break;
        case "Professor":
            include './menuProfessor.php';
            break;
        case "Aluno":
            include './menuAluno.php';
            break;
    }
    ?>

</body>
</html>