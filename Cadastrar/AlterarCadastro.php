<?php
	require_once('CadastroDAO.php');
	require_once('Cadastro.php');
    require_once('../include/functions.php');
    require_once('../include/sessions.php');
    require_once('../include/header.php');

	$codigo = $_POST['codigo'];
	$nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $datanasc = $_POST['datanascimento'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

	$dao = new ClienteDAO();
	$objcliente = new Cliente();

    
	$objcliente->set_codigo($codigo);
	$objcliente->set_nome($nome);
    $objcliente->set_sobrenome($sobrenome);
    $objcliente->set_datanasc($datanasc);
    $objcliente->set_cpf($cpf);
    $objcliente->set_telefone($telefone);
    $objcliente->set_email($email);
    $objcliente->set_senha($senha);

	if($dao->alterar($objcliente)){
        echo "<br>
        <div class=\"container\">
            <div class=\"alert alert-success\">Produto alterado com sucesso!</div>
            <div class=\"d-grid gap-2 col-6 mx-auto mb-2\">
            <a href=\"ConsultaCadastro.php\" class=\"col btn btn-warning btn-block\" style=\"margin: 1rem 0px 0px 0px;\">Voltar</a>
        </div>
        </div>
        ";
	}
	else{
        echo "<br>
        <div class=\"container\">
            <div class=\"alert alert-danger\">Algo deu errado. Tente novamente.</div>
            <div class=\"d-grid gap-2 col-6 mx-auto mb-2\">
            <a href=\"ConsultaCadastro.php\" class=\"col btn btn-warning btn-block\" style=\"margin: 1rem 0px 0px 0px;\">Voltar</a>
        </div>
        </div>
        ";
	}
?>