<?php
    require_once('categoriaDTO.php');
    require_once('../db/bd_gerenciador.php');

    class categoriaDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        //Inserir Categoria
        public function inserir($ObjCategoria){
            $meu_resultado = $this->con->query("INSERT INTO CATEGORIAS(CODIGO_AUTOR, NOME, DATA_CRIACAO, ATIVO) VALUES ('" 
                . $ObjCategoria->get_codigo_autor() . "', '" . $ObjCategoria->get_nome() . "','".$ObjCategoria->get_data_criacao(). "','" . $ObjCategoria->get_ativo() . "')");

            return ($meu_resultado->rowCount() > 0);     
        }

        //Altera Categoria
        public function alterar($ObjCategoria){
            $sql = $this->con->query("UPDATE CATEGORIAS SET 
                CODIGO_AUTOR = '" . $ObjCategoria->get_codigo_autor() . "',
                NOME = '" . $ObjCategoria->get_nome() . "',
                DATA_CRIACAO = '" . $ObjCategoria->get_data_criacao() . "',
                ATIVO = '" . $ObjCategoria->get_ativo() . "'
                WHERE (CODIGO = " . $ObjCategoria->get_codigo() . ")");
            
            return ($sql->rowCount() > 0);
        }

        //Excluir Categoria
        public function excluir($codigo){
            $meu_comando = $this->con->query("DELETE FROM CATEGORIAS WHERE (codigo = '" . $codigo . "')");
    
            if ($meu_comando->rowCount() > 0){
               return true;
            }else{
                return false;
            }
        }

        //Obter Codigo
        public function obter($codigo){
            $list = $this->obter_lista("(CODIGO = '" . $codigo . "')");
            
            if (count($list) == 0)
                throw new Exception("Categoria não localizada!");

            return $list[0];
        }

        //Obter todas as Categorias Ativadas
        public function obter_todos_ativados(){
            return $this->obter_lista("ativo = 1");
        }

        //Obter todas as Categorias Desativadas
        public function obter_todos_desativados(){
            return $this->obter_lista("ativo = 0");
        }

        //Metodo privado para obter todos os itens de uma tabela, modular
        private function obter_lista($cond = ""){
            $lista = [];
    
            $sql = "SELECT CODIGO, CODIGO_AUTOR, NOME, DATA_CRIACAO, ATIVO FROM CATEGORIAS ";
            
            if ($cond != "")
                $sql = $sql . "WHERE (" . $cond . ")";
    
            $sql = $sql . " ORDER BY NOME";
    
            $meu_comando = $this->con->query($sql);
    
            while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)){
                $objCategoria = new categoriaDTO();
                $objCategoria->set_codigo($linha['codigo']);
                $objCategoria->set_codigo_autor($linha['CODIGO_AUTOR']);
                $objCategoria->set_nome($linha['NOME']);
                $objCategoria->set_data_criacao($linha['DATA_CRIACAO']);
                $objCategoria->set_ativo($linha['ATIVO']);
                
                array_push($lista, $objCategoria);
            }
            return $lista;
        }
    }
?>