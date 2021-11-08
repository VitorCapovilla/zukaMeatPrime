<?php
	require_once('CategoriaDAO.php');
	require_once('Categoria.php');
    require_once('../include/functions.php');
    require_once('../include/sessions.php');
    require_once('../include/header.php');

	$codigo = $_POST['codigo'];
	$titulo = $_POST['titulo'];

	$dao = new CategoriaDAO();
	$objCategorias = new Categoria();

	$objCategorias->set_codigo($codigo);
	$objCategorias->set_titulo($titulo);

	if($dao->alterar($objCategorias)){
        echo "<br>
        <div class=\"container\">
            <div class=\"alert alert-success\">Categoria alterada com sucesso!</div>
            <div class=\"d-grid gap-2 col-6 mx-auto mb-2\">
            <a href=\"ConsultaCategoria.php\" class=\"col btn btn-warning btn-block\" style=\"margin: 1rem 0px 0px 0px;\">Voltar</a>
        </div>
        </div>
        ";
	}
	else{
        echo "<br>
        <div class=\"container\">
            <div class=\"alert alert-danger\">Algo deu errado. Tente novamente.</div>
            <div class=\"d-grid gap-2 col-6 mx-auto mb-2\">
            <a href=\"ConsultaCategoria.php\" class=\"col btn btn-warning btn-block\" style=\"margin: 1rem 0px 0px 0px;\">Voltar</a>
        </div>
        </div>
        ";
	}
?>