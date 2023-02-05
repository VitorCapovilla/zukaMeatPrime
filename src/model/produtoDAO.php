<?php
    require_once ('categoriaDAO.php');
    require_once ('produtoDTO.php');
    require_once ('../db/bd_gerenciador.php');

    class produtoDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        // Inserir Produto
        public function inserir($objProdutos){
            $meu_resultado = $this->con->query("INSERT INTO PRODUTOS(CODIGO_AUTOR, CODIGO_CATEGORIA, NOME, DESCRICAO, COD_BARRA, PESO, PRECO, ATIVO, IMAGEM, DATA_VALIDADE, DATA_CADASTRO) VALUES ('"
            . $objProdutos->get_codigo_autor() . "', '"
            . $objProdutos->get_codigo_categoria() . "', '"
            . $objProdutos->get_nome() . "', '"
            . $objProdutos->get_descricao() . "', '" 
            . $objProdutos->get_peso() . "', '" 
            . $objProdutos->get_preco() . "', '"
            . $objProdutos->get_ativo() . "', '" 
            . $objProdutos->get_imagem() . "', '" 
            . $objProdutos->get_data_validade() . "', '" 
            . $objProdutos->get_data_cadastro() . "')");
            
            return ($meu_resultado->rowCount() > 0);  
        }

        //Alterar Produto
        function alterar($objProdutos){
            $meu_comando = $this->con->query("UPDATE PRODUTOS SET 
            CODIGO_AUTOR    = '" . $objProdutos->get_codigo_autor() . "', 
            CODIGO_CATEGORIA = '" . $objProdutos->get_codgio_categoria() ."', 
            NOME    = '". $objProdutos->get_nome() . "', 
            DESCRICAO = '". $objProdutos->get_descricao() . "', 
            COD_BARRA      = '" . $objProdutos->get_cod_barra() . "', 
            PESO     = '". $objProdutos->get_peso() . "',
            PRECO     = '". $objProdutos->get_preco() . "', 
            ATIVO     = '". $objProdutos->get_ativo() . "', 
            IMAGEM     = '". $objProdutos->get_imagem() . "', 
            DATA_VALIDADE     = '". $objProdutos->get_data_validade() . "', 
            DATA_CADASTRO     = '". $objProdutos->get_data_cadastro() . "'
            WHERE (codigo = " . $objProdutos->get_codigo(). ")");
    
            if ($meu_comando->rowCount() > 0){ 
                return true;
            }
            else{
                return false;
            }
        }

        //Excluir Produto
        function excluir($codigo){
            $meu_comando = $this->con->query("DELETE FROM PRODUTOS WHERE (CODIGO = '" . $codigo . "')");
    
            if ($meu_comando->rowCount() > 0){
                   return true;
               }
               else{
                   return false;
               }
        }

        function obter_por_nome($nome){
            $lista = [];
            $meu_comando = $this->con->query("SELECT CODIGO, CODIGO_AUTOR, CODIGO_CATEGORIA, NOME, DESCRICAO, COD_BARRA, PESO, PRECO, ATIVO, IMAGEM, DATA_VALIDADE, DATA_CADASTRO FROM PRODUTOS WHERE (NOME like '%" . $nome . "%');");
     
            while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)) {
                $objProduto = new produtoDTO();
                $objProduto->set_codigo($linha['CODIGO']);
                $objProduto->set_codigo_autor($linha['CODIGO_AUTOR']);
                $objProduto->set_codigo_categoria($linha['CODIGO_CATEGORIA']);
                $objProduto->set_nome($linha['NOME']);
                $objProduto->set_descricao($linha['DESCRICAOS']);
                $objProduto->set_cod_barra($linha['COD_BARRA']);
                $objProduto->set_peso($linha['PESO']);
                $objProduto->set_preco($linha['PRECO']);
                $objProduto->set_ativo($linha['ATIVO']);
                $objProduto->set_imagem($linha['IMAGEM']);
                $objProduto->set_data_validade($linha['DATA_VALIDADE']);
                $objProduto->set_data_cadastro($linha['DATA_CADASTRO']);
        
                return $objProduto;
            }
    
            return $lista;
        }

        public function obter_todos(){
            return True;
        }
    }
?>