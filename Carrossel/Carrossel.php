<?php
    class Carrossel{
        private $codigo;
        private $imagem;
        private $autor;
        private $datahora;


        function set_codigo($x){
            $this->codigo = $x;
        }

        function get_codigo(){
            return $this->codigo;
        }

        function set_imagem($x){
            $this->imagem = $x;
        }

        function get_imagem(){
            return $this->imagem;
        }

        function set_autor($x){
            $this->autor=$x;
        }
        
        function get_autor(){
            return $this->autor;
        }
        
        function set_datahora($x){
            $this->datahora = $x;
        }
        
        function get_datahora(){
            return $this->datahora;
        }
    }
?>