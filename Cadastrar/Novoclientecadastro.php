<?php 
require_once("../include/functions.php");
require_once("../include/sessions.php");
require_once("cadastro.php");
require_once("cadastroDAO.php"); 

if(isset($_POST["cadastrar"])){
    $Nome = $_POST["nome"];
    $Sobrenome = $_POST["sobrenome"];
    $datanasc = $_POST["datanasc"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $objCadastroDao = new ClienteDAO();
    $objcliente = new Cliente();

    $objcliente->set_Nome($Nome);
    $objcliente->set_Sobrenome($Sobrenome);
    $objcliente->set_datanasc($datanasc);
    $objcliente->set_cpf($cpf);
    $objcliente->set_telefone($telefone);
    $objcliente->set_email($email);
    $objcliente->set_senha($senha);


    if ($objCadastroDao->inserir($objcliente)){
        $_SESSION["SuccessMessage"]="Você foi cadastrado com sucesso! Entre no campo de login e entre em sua conta";
        Redirect_to("Novoclientecadastro.php");
    }else{
        $_SESSION["ErrorMessage"]="Ops, algo deu errado, tente fazer o cadastro novamente";
        Redirect_to("Novoclientecadastro.php");
    }
}


require_once("../include/header.php"); 
?>

<body>
    <script>
        $(document).ready(function () {
            $('#data').mask('00/00/0000');
            $('#cpf').mask('000.000.000-00');
            $('#telefone').mask('(00) 0000000000');
        });
    </script>

    <div class="container" style="margin: 3em;">
        <div class="cadastro">

        <?php 

            echo ErrorMessage(); 
            echo SuccessMessage(); 

        ?>

            <div class="backLogin">
                <a class="txtVoltar text-decoration-none" href="../Login/login.php">
                    <i class="arrowVoltar bi bi-box-arrow-in-left" aria-hidden="true"></i>
                    Já sou cliente
                </a>
            </div>

            <form name="formCadastro" action="Novoclientecadastro.php" method="POST">
                <div class="form-name">
                    CADASTRO
                </div>
                <div class="form-desc">
                    Insira as informações solicitadas abaixo
                </div>

                <div class="inputs row">
                    <div class="input col-md-4">
                        <input required type="text" name="nome" id="nome" autocomplete="off">
                        <label>NOME</label>
                        <span class="error error_nome"></span>
                    </div>
                    <div class="input col-md-4">
                        <input required type="text" name="sobrenome" id="sobrenome" autocomplete="off">
                        <label>SOBRENOME</label>
                        <span class="error error_sobrenome"></span>
                    </div>
                    <div class="input col-md-4">
                        <input required type="text" name="datanasc" id="data" autocomplete="off">
                        <label>DATA DE NASCIMENTO</label>
                        <span class="error error_data"></span>
                    </div>

                    <div class="input col-md-2">
                        <input required type="text" name="cpf" id="cpf" autocomplete="off">
                        <label>CPF</label>
                        <span class="error error_cpf"></span>
                    </div>
                    <div class="input col-md-2">
                        <input required type="text" name="telefone" id="telefone" autocomplete="off">
                        <label>TELEFONE</label>
                        <span class="error error_telefone"></span>
                    </div>
                    <div class="input col-md-4">
                        <input required type="email" name="email" id="email" data-min-length="2" autocomplete="off"
                            data-email-validate>
                        <label>E-MAIL</label>
                        <span class="error error_email"></span>
                    </div>
                    <div class="input col-md-4">
                        <input required type="email" id="confemail" autocomplete="off">
                        <label>DIGITE O E-MAIL NOVAMENTE</label>
                        <span class="error error_confemail"></span>
                    </div>
                    <div class="input col-md-6">
                        <input required type="password" name="senha" id="senha" autocomplete="off">
                        <label>SENHA</label>
                        <span class="error error_senha"></span>

                        <i class="olho bi bi-eye" style="display: block;"></i>
                        <i class="olho bi bi-eye-slash" style="display: none;"></i>
                    </div>
                    <div class="input col-md-6">
                        <input required type="password" id="confsenha" autocomplete="off">
                        <label>DIGITE A SENHA NOVAMENTE</label>
                        <span class="error error_confsenha"></span>

                        <i class="olho bi bi-eye" style="display: block;"></i>
                        <i class="olho bi bi-eye-slash" style="display: none;"></i>
                    </div>
                </div>

                <div class="baixo row">
                    <div class="col-md-4">
                        <div class="recaptcha">
                            <div class="g-recaptcha" data-sitekey="6LesNGgcAAAAALAt6omlSqOXFCnApmtKC_QGL5tp"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="termos">
                            Ao criar a conta declaro que aceito os termos de <a href="../TermosGerais/privacidade.php">politíticas de privacidade</a> do site.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button onclick="cadastrar()" name="cadastrar" class="btnCadastrar">CRIAR CONTA</button>
                    </div>
                </div>
            </form>
        </div>

        <p class="error-validation template"></p>
    </div>
</body>

<?php require_once("../include/footer.php");?>

</html>