<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/fontawesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="../ckeditor/ckeditor.js"></script>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/confirm.css" rel="stylesheet">
  <title>+Boletim</title>
</head>

<body>
      <?php
            require_once '../dao/AvisoDAO.php';
            $msg="";
            if(isset($_GET["msg"])){
                $msg = $_GET["msg"];
            }
            $id= $_GET["id"];
            $avisoDAO= new AvisoDAO();
            $aviso = $avisoDAO->getAvisoById($id);
            
        ?>
        <h2> Formulário Alteração de Aviso</h2>
        <h5><?=$msg?></h5>
        <form action="../controller/alterAvisoController.php" method="POST">  
            <input type="hidden" name="id" value="<?=$aviso['Id_Aviso']?>"/>
            <textarea name="aviso" id="editor1" value="<?=$aviso['Aviso_Professor']?>"></textarea>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
            
        <a type="submit" class="btn btn-primary float-right" id="btn-aviso" href="#myModal" data-toggle="modal">Editar</a>
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
                    <p>Deseja confirmar a edição do aviso?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="confirmar">Confirmar</button>
                </div>
            </div>
	</div>
    </div>
        </form>

  <!-- Bootstrap core JavaScript -->
  <script src="../jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
