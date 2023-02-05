<?php
    require_once("../model/cadastroDTO.php");
    require_once("../model/cadastroDAO.php");
    require_once("../controller/AutenticacaoController.php");
    require_once("../include/functions.php");
    require_once("../include/sessions.php");
    require_once("../include/header.php");
    require_once("../include/links.html");
    require_once("../utils/BCrypt.php");

    if(isset($_POST["Salvar"])){
        $Nome = $_POST["Nome"];
        $Sobrenome = $_POST["Sobrenome"];
        $Celular = $_POST["Celular"];
        $Data_nascimento = $_POST["Datanascimento"];
        $Endereco = '1';
        $Username = $_POST["Usuario"];
        $Email = $_POST["Email"];
        $Contratado = '0';
        $Nivel = '0';
        $Salario = '0';
        $Ativo = '1';
        $Data_contratacao = '2000-01-01';
        $Data_cadastro = date('Y/m/d');
        $Senha = $_POST["Senha"];


        if(empty($Nome)){
            $_SESSION["ErrorMessage"]= "O campo NOME deve estar preenchido!";
            Redirect_to("cadastrarUsuario.php");
        }
        
        if(strlen($Nome)<3){
            $_SESSION["ErrorMessage"]= "O campo NOME deve conter mais de 3 caracteres";
            SuccessMessage();
        }
        
        if(strlen($Nome)>25){
            $_SESSION["ErrorMessage"]= "O campo não pode conter mais de 25 caracteres";
            SuccessMessage();
        }

        $objCadastroDAO = new cadastroDAO();
        $objCadastroDTO = new cadastroDTO();

        $objCadastroDTO->set_nome($Nome);
        $objCadastroDTO->set_sobrenome($Sobrenome);
        $objCadastroDTO->set_usuario($Username);
        $objCadastroDTO->set_celular($Celular);
        $objCadastroDTO->set_data_nascimento($Data_nascimento);
        $objCadastroDTO->set_endereco($Endereco);
        $objCadastroDTO->set_senha(BCrypt::hash($Senha));
        $objCadastroDTO->set_email($Email);
        $objCadastroDTO->set_contratado($Contratado);
        $objCadastroDTO->set_nivel($Nivel);
        $objCadastroDTO->set_salario($Salario);
        $objCadastroDTO->set_ativo($Ativo);
        $objCadastroDTO->set_data_contratacao($Data_contratacao);
        $objCadastroDTO->set_data_cadastro($Data_cadastro);

        if ($objCadastroDAO->inserir($objCadastroDTO)){
            $_SESSION["SuccessMessage"]="Você foi cadastrado com sucesso! Você será redirecionado para a pagina de login em 5 segundos!";
            ErrorMessage();
            sleep(5);
            Redirect_to("../view/login.php");
        }else{
            $_SESSION["ErrorMessage"]="Falha interna. Contate o administrador do sistema!";
            SuccessMessage();
        }
    }

?>

<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
<link rel="stylesheet" type="text/css" href="../css/cadastro.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">

<body>
    <div class="d-flex">
        <div class="row">
        <?php 

            echo ErrorMessage(); 
            echo SuccessMessage(); 

        ?>
        </div>
        <div class="container-fluid">

            <div class="row col-12 cadastro-card">
                <form action="cadastrarUsuario.php" method="POST">

                    <div class="row">
                        <div class="title text-center">
                            <h2 class="title-h2">Cadastrar-se - Preencha os dados solicitados</h2>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="Nome" id="Nome" class="form-control" placeholder="Nome" autofocus="true">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="Sobrenome" id="Sobrenome" class="form-control" placeholder="sobrenome" autofocus="true">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="Celular" id="Celular" class="form-control" placeholder="celular" autofocus="true">
                    </div>

                    <div class="input-group mb-3">
                        <input type="date" name="Datanascimento" id="Datanascimento" class="form-control" placeholDer="Data de Nascimento" autofocus="true">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="Endereco" id="Endereco" class="form-control" placeholder="Endereço" autofocus="true">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="Usuario" id="Usuario" class="form-control" placeholder="Username" autofocus="true">
                    </div>
                        
                    <div class="input-group mb-3">
                        <input type="text" name="Email" id="Email" class="form-control" placeholder="Email" autofocus="true">
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="Senha" id="Senha" class="form-control" placeholder="Senha">
                    </div>

                    <button type="submit" name="Salvar" id="Salvar" class="col-12 btn btn-primary espaco-top">ENTRAR</button>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../js/utils.js"></script>
</body>
</html>