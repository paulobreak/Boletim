<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Aviso</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../ckeditor/ckeditor.js"></script>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <?php
        $msg="";
        if(isset($_GET["msg"])){
            $msg = $_GET["msg"];
        }
    ?>
    <form action="../controller/cadastrarAvisoController.php" method="post">  
        <h5><?=$msg?></h5>
            <textarea name="aviso" id="editor1"></textarea>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
            
            <button type="submit" class="btn btn-primary float-right" id="btn-aviso">Cadastrar</button>
       
    </form>

</body>
</html>
