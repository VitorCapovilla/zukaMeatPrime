<?php
    require_once("../db/bd_gerenciador.php");
    require_once("../login/conexao.php");
    require_once("../addProduto/produtoDAO.php");
    require_once("../addProduto/produto.php");

    $codigo = $_GET['codigo'];
    $dao = new ProdutoDAO();
    $objProduto = $dao->obter($codigo);

    session_start();
    if(!isset($_SESSION['itens'])){
        $_SESSION['itens'] = array(); 
    }

    if(isset($_GET['add']) && $_GET['add'] == "carrinho"){
        $idProduto = $codigo;
        if(!isset($_SESSION['itens'][$idProduto])){
            $_SESSION['itens'][$idProduto] = 1;
        }else{
            $_SESSION['itens'][$idProduto] += 1;
        }
    }

    if(count($_SESSION['itens']) == 0){
        echo 'Carrinho vazio';
    }else{
        $conexao = new PDO('mysql:host=localhost;dbname=db_meatprime',"root","");
        foreach($_SESSION['itens'] as $objProduto => $quantidade){
            $select = $conexao->prepare("SELECT * FROM produtos WHERE codigo=?");
            $select->bindParam(1,$objProduto);
            $select->execute();
            $produtos = $select->fetchAll();
            $prodint = (int)$produtos[0]["preco"];
            $total = $quantidade * $prodint;
            echo
                'Nome:  '. $produtos[0]["titulo"] . '<br>'.
                'Preço: '. $produtos[0]["preco"]  . '<br>'.
                'Quantidade: '. $quantidade  . '<br>'.
                'Total = ' .number_format($total,2,",","."). '<br>'.
                '<a href="remover.php?remover=carrinho&codigo=' .$idProduto. '">Remover Do carrinho</a>'.'<hr>';
                
                
        }
    }
?>