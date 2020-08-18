<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../+Boletim/imagens/icon2.png"/>
        <link rel="stylesheet" href="../+Boletim/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../+Boletim/css/styleLogin.css">
        <title>+Boletim</title>
    </head>
    <body>
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <center><img src="../+Boletim/imagens/user.png"></center>
                            <form id="formlogin" class="form" action="controller/loginController.php" method="post">
                                <h3 class="text-center">Login</h3>
                                <div class="form-group">
                                    <label>Login</label><br>
                                    <input type="text" name="usuario" class="form-control" placeholder="Seu Login">
                                </div>
                                <div class="form-group">
                                    <label>Senha</label><br>
                                    <input type="password" name="senha" class="form-control" placeholder="Sua Senha">
                                </div>
                                <center>
                                    <?php
                                    if (!empty($_GET["msg"])) {
                                        echo "<div id='errorlogin'>", $_GET["msg"], "</div>";
                                    }
                                    ?>
                                </center>
                                <div class="form-group">
                                    <center><input type="submit" name="entrar" class="btn btn-success btn-md" value="Entrar"></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../+Boletim/jquery/jquery.slim.min.js"></script>
        <script src="../+Boletim/bootstrap/js/bootstrap.bundle.js.map"></script>
    </body>
</html>
