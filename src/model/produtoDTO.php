<?php
    class produtoDTO{
        private $codigo;
        private $codigo_autor;
        private $codigo_categoria;
        private $nome;
        private $descricao;
        private $cod_barra;
        private $peso;
        private $preco;
        private $ativo;
        private $imagem;
        private $data_validade; /* **** */
        private $data_cadastro;

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

        public function set_codigo_categoria($codigo_categoria){
            $this->codigo_categoria = $codigo_categoria;
        }

        public function get_codigo_categoria(){
            return $this->codigo_categoria;
        }

        public function set_nome($nome){
            $this->nome = $nome;
        }

        public function get_nome(){
            return $this->nome;
        }

        public function set_descricao($descricao){
            $this->descricao = $descricao;
        }

        public function get_descricao(){
            return $this->descricao;
        }

        public function set_cod_barra($cod_barra){
            $this->cod_barra = $cod_barra;
        }

        public function get_cod_barra(){
            return $this->cod_barra;
        }

        public function set_peso($peso){
            $this->peso = $peso;
        }

        public function get_peso(){
            return $this->peso;
        }

        public function set_preco($preco){
            $this->preco = $preco;
        }

        public function get_preco(){
            return $this->preco;
        }

        public function set_ativo($ativo){
            $this->ativo = $ativo;
        }

        public function get_ativo(){
            return $this->ativo;
        }

        public function set_imagem($imagem){
            $this->imagem = $imagem;
        }

        public function get_imagem(){
            return $this->imagem;
        }

        public function set_data_validade($data_validade){
            $this->data_validade = $data_validade;
        }

        public function get_data_validade(){
            return $this->data_validade;
        }

        public function set_data_cadastro($data_cadastro){
            $this->data_cadastro = $data_cadastro;
        }

        public function get_data_cadastro(){
            return $this->data_cadastro;
        }
    }
?>