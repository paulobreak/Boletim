<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../imagens/icon2.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>+Boletim</title>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Menu Lateral -->
    <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"><a href="#"><img src="../imagens/logo.png" alt="+boletim" class="logo"></a></div>
        <div class="list-group list-group-flush">
            <a href="../view/turma.php" class="list-group-item list-group-item-action border-bottom" target="iframe">Turmas</a>
        </div>
    </div>
    <!-- /Menu Lateral -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">MENU</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item usuario">
                <?php
                if (isset($_SESSION["usuario"])){
                    echo $_SESSION["usuario"];
                }
                ?>
            </li>
            <li class="nav-item avatar dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                  <img src="../imagens/user2.png" class="rounded-circle z-depth-0"
                  alt="">
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-secondary"
                aria-labelledby="navbarDropdownMenuLink-55">
                <a class="dropdown-item" href="#">Editar Perfil</a>
                <a class="dropdown-item" href="../controller/logoffController.php">Sair</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
          <iframe src="../view/turma.php" name="iframe"></iframe>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>
</html>
