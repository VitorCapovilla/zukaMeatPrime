<?php
    require_once('cadastro.php');
    require_once('../db/bd_gerenciador.php');

    class ClienteDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        public function inserir($obj){
            $meu_resultado = $this->con->query("INSERT INTO cliente(nome, sobrenome, datanascimento, cpf, telefone, email, senha) VALUES ('" . $obj->get_nome() . "', '" . $obj->get_sobrenome() . "', '" . $obj->get_datanasc() . "', '" . $obj->get_cpf() . "', '" . $obj->get_telefone() . "', '" . $obj->get_email() . "', '" . $obj->get_senha() . "')");
            
            return ($meu_resultado->rowCount() > 0);  
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

        public function login($email, $senha){
            $meu_comando = $this->con->query('SELECT * FROM cliente where email = "' . $email . '" AND senha = "' . $senha .'"');
            session_start();
            if($meu_comando->rowCount() > 0){
                $dados = $meu_comando->fetch();
                
                $_SESSION['loggedin'] = true;
                $_SESSION['idusuario'] = $dados['codigo'];
    
                return true;
            }else{
                return false;
            }
        }
    }
?>