<?php
    require_once('../db/bd_gerenciador.php');
    require_once('Categoria.php');

    class CategoriaDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        //Inserir
        public function inserir($obj){
            $meu_resultado = $this->con->query("INSERT INTO categoria(titulo, autor, datahora) VALUES ('" 
                . $obj->get_titulo() . "', '" . $obj->get_autor() . "', '" . $obj->get_datahora() . "')");

            return ($meu_resultado->rowCount() > 0);     
        }

        //Altera Categoria
        function alterar($objCategoria){
            $meu_comando = $this->con->query("UPDATE categoria SET titulo = '" . $objCategoria->get_titulo() . "' WHERE (codigo = " . $objCategoria->get_codigo(). ")");
            
            if ($meu_comando->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        //Excluir Categoria
        function excluir($codigo){
            $meu_comando = $this->con->query("DELETE FROM categoria WHERE (codigo = '" . $codigo . "')");
    
            if ($meu_comando->rowCount() > 0){
                   return true;
               }
               else{
                   return false;
               }
        }

        //Obter TODOS
        function obter_todos(){
            $meu_resultado = $this->con->query("SELECT codigo, titulo, autor, datahora FROM categoria");
            $categorias = [];

            while($linha = $meu_resultado->fetch(PDO::FETCH_ASSOC)){
                $objCategoria = new Categoria();
                $objCategoria->set_codigo($linha['codigo']);
                $objCategoria->set_titulo($linha['titulo']);
                $objCategoria->set_autor($linha['autor']);
                $objCategoria->set_datahora($linha['datahora']);

                array_push($categorias, $objCategoria);
            }

            return $categorias;
        }

        //Obtem codigo
        function obter($codigo){
            $meu_comando =$this->con->query("SELECT codigo, titulo FROM categoria WHERE (codigo = " . $codigo . ");");
            $linha = $meu_comando->fetch(PDO::FETCH_ASSOC);
    
            $objCategorias = new Categoria();
            $objCategorias->set_codigo($linha['codigo']);
            $objCategorias->set_titulo($linha['titulo']);
    
            return $objCategorias;
        }

    }
?>