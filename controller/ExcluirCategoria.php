<?php
    require_once('../model/categoriaDAO.php');
    require_once('../include/functions.php');

    $CategoriaDAO = new CategoriaDAO();

    $codigo = $_GET["codigo"];

    $CategoriaDAO->excluir($codigo);

    Redirect_to('../pages/consultarCategorias.php');
?>