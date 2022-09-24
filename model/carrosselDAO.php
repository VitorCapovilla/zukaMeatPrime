<?php
    require_once('carrosselDTO.php');
    require_once('../db/bd_gerenciador.php');

    class carrosselDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        public function inserir($obj){
            $meu_resultado = $this->con->query("INSERT INTO carrossel(imagem, autor, datahora) VALUES ('" 
                . $obj->get_imagem() . "', '" . $obj->get_autor() . "', '" . $obj->get_datahora() . "')");

            return ($meu_resultado->rowCount() > 0);     
        }

        //Excluir Cliente
        function excluir($codigo){
            $meu_comando = $this->con->query("DELETE FROM carrossel WHERE (codigo = '" . $codigo . "')");
            
            if ($meu_comando->rowCount() > 0){
                    return true;
                }
                else{
                   return false;
               }
        }

        public function obter_todos(){
            $meu_resultado = $this->con->query("SELECT codigo, imagem, autor, datahora FROM carrossel");
            $carrossel = [];

            while($linha = $meu_resultado->fetch(PDO::FETCH_ASSOC)){
                $objcarrossel = new Carrossel();
                $objcarrossel->set_codigo($linha['codigo']);
                $objcarrossel->set_imagem($linha['imagem']);
                $objcarrossel->set_autor($linha['autor']);
                $objcarrossel->set_datahora($linha['datahora']);

                array_push($carrossel, $objcarrossel);
            }

            return $carrossel;
        }
    }
?>