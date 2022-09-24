<?php
    class produtoDTO{
        private $codigo;
        private $titulo; 
        private $categoria;
        private $imagem;
        private $descricao;
        private $peso;
        private $preco;
        private $autor;
        private $datahora;


        function set_codigo($x){
            $this->codigo = $x;
        }

        function get_codigo(){
            return $this->codigo;
        }

        function set_titulo($x){
            $this->titulo = $x;
        }

        function get_titulo(){
            return $this->titulo;
        }

        function set_categoria($x){
            $this->categoria=$x;
        }

        function get_categoria(){
            return $this->categoria;
        }

        function set_imagem($x){
            $this->imagem = $x;
        }

        function get_imagem(){
            return $this->imagem;
        }

        function set_descricao($x){
            $this->descricao=$x;
        }

        function get_descricao(){
            return $this->descricao;
        }

        function set_peso($x){
            $this->peso = $x;
        }

        function get_peso(){
            return $this->peso;
        }

        function set_preco($x){
            $this->preco = $x;
        }

        function get_preco(){
            return $this->preco;
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