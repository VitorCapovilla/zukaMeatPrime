<?php

    require_once('CadastroDTO.php');

    class CategoriaDTO{
        private $codigo;
        private $autor;
        private $nome;
        private $ativo;
        private $data_criacao;

        public function __construct(){
            $this->autor = new CadastroDTO();
        }

        public function set_codigo($x){
            $this->codigo = $x;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_autor($x){
            $this->autor = $x;
        }

        public function get_autor(){
            return $this->autor;
        }

        public function set_nome($x){
            $this->nome = $x;
        }

        public function get_nome(){
            return $this->nome;
        }

        public function set_data_criacao($x){
            $this->data_criacao = $x;
        }

        public function get_data_criacao(){
            return $this->data_criacao;
        }

        public function set_ativo($x){
            $this->ativo = $x;
        }

        public function get_ativo(){
            return $this->ativo;
        }
    }

    ?>