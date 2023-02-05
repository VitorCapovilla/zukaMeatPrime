<?php
    require_once('cadastroDTO.php');
    require_once('../db/bd_gerenciador.php');

    class cadastroDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        public function inserir($objUsuario){ 
            $sql = $this->con->query("INSERT INTO USUARIOS (ENDERECO, CONTRATADO, NOME, SOBRENOME, USUARIO, CELULAR, EMAIL, SENHA, NIVEL, SALARIO, ATIVO, DATA_CONTRATACAO, DATA_NASCIMENTO, DATA_CADASTRO) VALUES (
            '" . $objUsuario->get_endereco() . "',
            '" . $objUsuario->get_contratado() . "',
            '" . $objUsuario->get_nome() . "',
            '" . $objUsuario->get_sobrenome() . "',
            '" . $objUsuario->get_usuario() . "',
            '" . $objUsuario->get_celular() . "',
            '" . $objUsuario->get_email() . "',
            '" . $objUsuario->get_senha() . "',
            '" . $objUsuario->get_nivel() . "',
            '" . $objUsuario->get_salario() . "',
            '" . $objUsuario->get_ativo() . "',
            '" . $objUsuario->get_data_contratacao() . "',
            '" . $objUsuario->get_data_nascimento() . "',
            '" . $objUsuario->get_data_cadastro() . "')");
    
            return ($sql->rowCount() > 0);
        }

        //Altera Cadastro
        function alterar($objcliente){
            $meu_comando = $this->con->query("UPDATE cliente SET nome = '" . $objcliente->get_nome() . "', sobrenome = '". $objcliente->get_sobrenome() .  "', datanascimento = '". $objcliente->get_datanasc() .  "', cpf = '". $objcliente->get_cpf() .  "', telefone ='". $objcliente->get_telefone() .  "', email = '". $objcliente->get_email() .  "', senha = '". $objcliente->get_senha() .  "' WHERE (codigo = " . $objcliente->get_codigo(). ")");
    
            if ($meu_comando->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        //Excluir Cliente
        function excluir($codigo){
            $meu_comando = $this->con->query("DELETE FROM cliente WHERE (codigo = '" . $codigo . "')");
    
            if ($meu_comando->rowCount() > 0){
                   return true;
               }
               else{
                   return false;
               }
        }

        public function obter_todos(){
            $meu_resultado = $this->con->query("SELECT codigo, nome, sobrenome, datanascimento, cpf, telefone, email, senha FROM cliente");
            $clientes = [];

            while($linha = $meu_resultado->fetch(PDO::FETCH_ASSOC)){
                $objcliente = new Cliente();
                $objcliente->set_codigo($linha['codigo']);
                $objcliente->set_nome($linha['nome']);
                $objcliente->set_sobrenome($linha['sobrenome']);
                $objcliente->set_datanasc($linha['datanascimento']);
                $objcliente->set_cpf($linha['cpf']);
                $objcliente->set_telefone($linha['telefone']);
                $objcliente->set_email($linha['email']);
                $objcliente->set_senha($linha['senha']);

                array_push($clientes, $objcliente);
            }

            return $clientes;
        }

        function obter($codigo){
            $meu_comando =$this->con->query("SELECT codigo, nome, sobrenome, datanascimento, cpf, telefone, email, senha FROM cliente WHERE (codigo = " . $codigo . ");");
            $linha = $meu_comando->fetch(PDO::FETCH_ASSOC);
    
            $c = new Cliente();
            $c->set_codigo($linha['codigo']);
            $c->set_nome($linha['nome']);
            $c->set_sobrenome($linha['sobrenome']);
            $c->set_datanasc($linha['datanascimento']);
            $c->set_cpf($linha['cpf']);
            $c->set_telefone($linha['telefone']);
            $c->set_email($linha['email']);
            $c->set_senha($linha['senha']);
    
            return $c;
        }
    }
?>