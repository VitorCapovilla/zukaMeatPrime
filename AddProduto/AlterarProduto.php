<?php
	require_once('ProdutoDAO.php');
	require_once('Produto.php');
    require_once('../include/functions.php');
    require_once('../include/sessions.php');
    require_once('../include/header.php');

	$codigo = $_POST['Codigo'];
	$titulo = $_POST['Titulo'];
    $titulocategoria = $_POST['TituloCategoria'];
    $imagem = $_POST['image'];
    $peso = $_POST['Peso'];
    $preco = $_POST['Preco'];
    $descricao = $_POST['descricao'];

	$dao = new ProdutoDAO();
	$objProduto = new Produto();

	$objProduto->set_codigo($codigo);
	$objProduto->set_titulo($titulo);
    $objProduto->set_categoria($titulocategoria);
	$objProduto->set_imagem($imagem);
    $objProduto->set_peso($peso);
	$objProduto->set_preco($preco);
    $objProduto->set_descricao($descricao);

	if($dao->alterar($objProduto)){
        echo "<br>
        <div class=\"container\">
            <div class=\"alert alert-success\">Produto alterado com sucesso!</div>
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
?>