<?php
    class categoriaDTO{
        private $codigo;
        private $codigo_autor;
        private $nome;
        private $ativo;
        private $data_criacao;

        public function set_codigo($codigo){
            $this->codigo = $codigo;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_codigo_autor($codigo_autor){
            $this->codigo_autor = $codigo_autor;
        }

        public function get_codigo_autor(){
            return $this->codigo_autor;
        }

        public function set_nome($nome){
            $this->nome = $nome;
        }

        public function get_nome(){
            return $this->nome;
        }

        public function set_data_criacao($data_criacao){
            $this->data_criacao = $data_criacao;
        }

        public function get_data_criacao(){
            return $this->data_criacao;
        }

        public function set_ativo($ativo){
            $this->ativo = $ativo;
        }

        public function get_ativo(){
            return $this->ativo;
        }
    }

    ?>