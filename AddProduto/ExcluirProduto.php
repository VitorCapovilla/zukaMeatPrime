<?php
	require_once('ProdutoDAO.php');
    require_once("../include/sessions.php");
    require_once('../include/header.php');

	$codigo = $_GET['codigo'];
	$dao = new ProdutoDAO();

	if($dao->excluir($codigo)){
		echo "<br>
        <div class=\"container\">
            <div class=\"alert alert-success\">Produto excluído com sucesso</div>
            <div class=\"d-grid gap-2 col-6 mx-auto mb-2\">
            <a href=\"ConsultaProduto.php\" class=\"col btn btn-warning btn-block\" style=\"margin: 1rem 0px 0px 0px;\">Voltar</a>
        </div>
        </div>
        ";
	}
	else{
		echo "<br>
        <div class=\"container\">
            <div class=\"alert alert-danger\">Algo deu errado. Tente novamente.</div>
            <div class=\"d-grid gap-2 col-6 mx-auto mb-2\">
            <a href=\"ConsultaProduto.php\" class=\"col btn btn-warning btn-block\" style=\"margin: 1rem 0px 0px 0px;\">Voltar</a>
        </div>
        </div>
        ";
	}
