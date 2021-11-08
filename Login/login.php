<?php
require_once("../cadastrar/cadastroDAO.php");
require_once("../Cadastrar/cadastro.php");
require_once("../include/header.php"); 
require_once("../include/functions.php");
?>

<link rel="stylesheet" href="style.css">

<body>
    <div class="login" style="margin: 20px;">

        <form action="logar.php" method="POST">
            <div class="form-name">
                LOGIN
            </div>
            <div class="input form-login">
                <input required type="email" name="email" autocomplete="off">
                <label for="email">E-MAIL</label>
                <span class="error"></span>
            </div>
            <div class="input form-login">
                <input required id="senha" type="password" name="senha" autocomplete="off">
                <label>SENHA</label>
                <span class="error"></span>
                <div class="esqueceuSenha">
                    <a class="forgotPassword text-decoration-none" href="recuperar_senha.php">
                        <i class="padlock bi bi-key-fill"></i>
                        Esqueceu sua senha?
                    </a>
                </div>
                <i class="olho bi bi-eye" style="display: block;"></i>
                <i class="olho bi bi-eye-slash" style="display: none;"></i>
            </div>

            <!-- <div class="recaptcha">
                <div class="g-recaptcha" data-sitekey="6LdhHGgcAAAAAHMYrxtt0mYOY21hjwU-37zKOLQa"></div>
            </div> -->

            <div class="form-login">
                <div class="row">
                    <div class="d-grid gap-2 col-6 mx-auto mb-2">
                        <button name="logar" class="btn btn-block login-account">ENTRAR</button>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mb-2">
                        <a class="criarConta btn btn-block" href="../Cadastrar/novoclientecadastro.php">CRIAR CONTA</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="social-media">
            <h5>OU</h5>
            <div class="social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>

                <a href="#"><i class="bi bi-google"></i></a>
            </div>
        </div>
    </div>
</body>

<?php require_once("../include/footer.php"); ?>

</html>