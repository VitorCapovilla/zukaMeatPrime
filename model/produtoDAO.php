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
        public function inserir($obj){
            $meu_resultado = $this->con->query("INSERT INTO produtos(titulo, categoria, imagem, descricao, peso, preco, autor, datahora) VALUES ('"
             . $obj->get_titulo() . "', '" . $obj->get_categoria() . "', '" . $obj->get_imagem() . "', '"
             . $obj->get_descricao() . "', '" . $obj->get_peso() . "', '" . $obj->get_preco() . "', '"
             . $obj->get_autor() . "', '" . $obj->get_datahora() . "')");
            
            return ($meu_resultado->rowCount() > 0);  
        }

        //Altera Categoria
        function alterar($objProdutos){
            $meu_comando = $this->con->query("UPDATE produtos SET titulo = '" . $objProdutos->get_titulo() . "', categoria = '" . $objProdutos->get_categoria() ."', imagem = '". $objProdutos->get_imagem() . "', descricao = '". $objProdutos->get_descricao() . "', peso = '" . $objProdutos->get_peso() . "', preco= '". $objProdutos->get_preco() . "' WHERE (codigo = " . $objProdutos->get_codigo(). ")");
    
            if ($meu_comando->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        //Excluir Categora
        function excluir($codigo){
            $meu_comando = $this->con->query("DELETE FROM produtos WHERE (codigo = '" . $codigo . "')");
    
            if ($meu_comando->rowCount() > 0){
                   return true;
               }
               else{
                   return false;
               }
        }

        // Obter Todos os Produtos
        public function obter_todos(){
            $meu_resultado = $this->con->query("SELECT prod.codigo, prod.titulo, ca.codigo as codigo_categoria, ca.titulo, prod.imagem, prod.descricao, 
            prod.peso, prod.preco, prod.autor, prod.datahora FROM PRODUTOS as prod LEFT JOIN categoria as ca on ca.titulo = ca.codigo");
            $produtos = [];

            while($linha = $meu_resultado->fetch(PDO::FETCH_ASSOC)){
                $objProduto = new produtoDTO();
                $objProduto->set_codigo($linha['codigo']);
                $objProduto->set_titulo($linha['titulo']);
                
                $objProduto->set_categoria(new categoriaDTO());
                $objProduto->get_categoria()->set_codigo($linha['codigo_categoria']);
                $objProduto->get_categoria()->set_titulo($linha['ca.titulo']);
                
                $objProduto->set_imagem($linha['imagem']);
                $objProduto->set_descricao($linha['descricao']);
                $objProduto->set_peso($linha['peso']);
                $objProduto->set_preco($linha['preco']);
                $objProduto->set_autor($linha['autor']);
                $objProduto->set_datahora($linha['datahora']);

                array_push($produtos, $objProduto);
            }

            return $produtos;
        }

        // Obter Código
        function obter($codigo){
            $meu_comando =$this->con->query("SELECT codigo, titulo, categoria, imagem, descricao, peso, preco, autor, datahora FROM produtos WHERE (codigo = " . $codigo . ");");
            $linha = $meu_comando->fetch(PDO::FETCH_ASSOC);
    
            $c = new Produto();
            $c->set_codigo($linha['codigo']);
            $c->set_titulo($linha['titulo']);
            $c->set_categoria($linha['categoria']);
            $c->set_imagem($linha['imagem']);
            $c->set_descricao($linha['descricao']);
            $c->set_peso($linha['peso']);
            $c->set_preco($linha['preco']);
            $c->set_autor($linha['autor']);
            $c->set_datahora($linha['datahora']);
    
            return $c;
        }

        function obter_por_nome($nome){
            $lista = [];
            $meu_comando = $this->con->query("SELECT codigo, titulo, categoria, imagem, descricao, peso, preco, autor, datahora FROM produtos WHERE (titulo like '%" . $nome . "%');");
     
            while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)) {
                $c = new Produto();
                $c->set_codigo($linha['codigo']);
                $c->set_titulo($linha['titulo']);
                $c->set_categoria($linha['categoria']);
                $c->set_imagem($linha['imagem']);
                $c->set_descricao($linha['descricao']);
                $c->set_peso($linha['peso']);
                $c->set_preco($linha['preco']);
                $c->set_autor($linha['autor']);
                $c->set_datahora($linha['datahora']);
        
                return $c;
            }
    
            return $lista;
        }
    }
?>