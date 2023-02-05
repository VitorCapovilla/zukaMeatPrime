<?php
    require_once("../include/header.php");
    require_once("../controller/AutenticacaoController.php");
    require_once("../model/LoginDTO.php");
    require_once("../include/links.html");

    $error = false;
    $msg_error = "";

    if(isset($_GET["error"])) {
        $error = true;
        $msg_error = "Usuário ou senha inválida!";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body onload="removeQueryParams()">
    <div class="container-fluid">

        <?php

            if ($error){
                echo '<div class="m-4 alert-message alert-message-error">' . $msg_error . '</div>';
            }

        ?>
        
        <div class="row col-12 login-card">
            <form action="../controller/LoginController.php" method="POST">

                <div class="row">
                    <div class="title text-center mb-4">
                        <h2 class="title-h2">Login - Coloque seu Email e Senha</h2>
                    </div>
                </div>
                    
                <div class="input-group mb-3">
                    <input type="text" name="Email" id="Email" class="form-control" placeholder="Email" required="true" autofocus="true">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="material-icons green">mail</i>
                        </span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="Senha" id="Senha" class="form-control" placeholder="Senha" required="true">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="material-icons green">lock</i>
                        </span>
                    </div>
                </div>

                <div class="moreOptions">
                    <a class="btn" href="esqueceusenha.php">Esqueceu a senha?</a>
                    <br>
                    <a class="btn"href="../pages/cadastrarUsuario.php">Cadastrar-se</a>
                    <br>
                </div>

                <button type="submit" name="btn-login" id="btn-login" class="col-12 btn btn-primary espaco-top">ENTRAR</button>

            </form>
        </div>
    </div>

    <script type="text/javascript" src="../js/utils.js"></script>
</body>
</html>