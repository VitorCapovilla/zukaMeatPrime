<?php
    require_once('categoriaDTO.php');
    require_once('../db/bd_gerenciador.php');

    class CategoriaDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        //Inserir Categoria
        public function inserir($ObjCategoria){
            $meu_resultado = $this->con->query("INSERT INTO CATEGORIAS(CODIGO_AUTOR, NOME, DATA_CRIACAO, ATIVO) VALUES ('" 
                . $ObjCategoria->get_autor() . "', '" . $ObjCategoria->get_nome() . "','".$ObjCategoria->get_data_criacao(). "','" . $ObjCategoria->get_ativo() . "')");

            return ($meu_resultado->rowCount() > 0);     
        }

        //Altera Categoria
        public function alterar($ObjCategoria){
            $sql = $this->con->query("UPDATE CATEGORIAS SET 
                CODIGO_AUTOR = '" . $ObjCategoria->get_autor() . "',
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

        public function desativar($codigo){
            $sql = $this->con->query("UPDATE CATEGORIAS SET ATIVO = '0' WHERE CODIGO = '". $codigo . "' ");
    
            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    
        public function ativar($codigo){
            $sql = $this->con->query("UPDATE CATEGORIAS SET ATIVO = '1' WHERE CODIGO = '". $codigo . "' ");
    
            if($sql->rowCount() > 0){
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
            return $this->obter_lista("c.ATIVO = 1");
        }

        //Obter todas as Categorias Desativadas
        public function obter_todos_desativados(){
            return $this->obter_lista("c.ATIVO = 0");
        }

        //Metodo privado para obter todos os itens de uma tabela, modular
        private function obter_lista($cond = ""){
            $lista = [];
    
            $sql = "SELECT c.CODIGO, c.CODIGO_AUTOR as CODIGO_AUTOR, u.NOME as NOME_AUTOR, u.EMAIL as EMAIL_AUTOR, c.NOME, c.DATA_CRIACAO, c.ATIVO FROM CATEGORIAS as c 
            LEFT JOIN USUARIOS AS u on CODIGO_AUTOR = u.CODIGO";
            
            if ($cond != ""){
                $sql = $sql . " WHERE (" . $cond . ")";
            }
    
            $sql = $sql . " ORDER BY c.CODIGO DESC";
    
            $meu_comando = $this->con->query($sql);
    
            while ($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)){
                $obj = new CategoriaDTO();
                $obj->set_codigo($linha['CODIGO']);

                $obj->set_autor(new CadastroDTO);
                $obj->get_autor()->set_codigo($linha['CODIGO_AUTOR']);
                $obj->get_autor()->set_nome($linha['NOME_AUTOR']);
                $obj->get_autor()->set_email($linha['EMAIL_AUTOR']);

                $obj->set_nome($linha['NOME']);
                $obj->set_data_criacao($linha['DATA_CRIACAO']);
                $obj->set_ativo($linha['ATIVO']);
                
                array_push($lista, $obj);
            }
            return $lista;
        }
    }
?>