<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../css/styleTurmas.css" rel="stylesheet">
  <title>+Boletim</title>
</head>

<body>
      <?php
        require_once '../dao/AvisoDAO.php';
        $avisoDAO = new AvisoDAO();
        $avisos = $avisoDAO->getAviso();
        $mensagem="";
        if(isset($_GET["msg"])){
            $mensagem=$_GET["msg"];
        }
        ?>
        
      <!--Grid row-->
      <div class="row wow fadeIn">
          <?php
                foreach ($avisos as $aviso) {
            ?>
            <!--Grid column-->
            <div class="col-md-6 mb-4">
    
              <!--Card-->
              <div class="card">
    
                <!--Card content-->
                <div class="card-body">
                    <h3>Aviso</h3>
                    <!-- Button modal -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#basicExampleModal">
                        Visualizar Aviso
                    </button>
  
                    <!-- Modal -->
                    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?=$aviso["aviso_professor"]?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <!--/.Card-->
    
            </div>
            <!--Grid column-->
            <?php
                }
            ?>
          </div>
          <!--Grid row-->

  <!-- Bootstrap core JavaScript -->
  <script src="../jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
