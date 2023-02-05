<?php
    class cadastroDTO{
        private $codigo;
        private $endereco;
        private $contratado;
        private $nome;
        private $sobrenome;
        private $usuario;
        private $celular;
        private $email;
        private $senha;
        private $nivel;
        private $salario;
        private $ativo;
        private $data_contratacao;
        private $data_nascimento;
        private $data_cadastro;

        public function set_codigo($x){
            $this->codigo = $x;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_endereco($x){
            $this->endereco = $x;
        }

        public function get_endereco(){
            return $this->endereco;
        }

        public function set_contratado($x){
            $this->contratado = $x;
        }

        public function get_contratado(){
            return $this->contratado;
        }

        public function set_nome($x){
            $this->nome = $x;
        }

        public function get_nome(){
            return $this->nome;
        }

        public function set_sobrenome($x){
            $this->sobrenome = $x;
        }

        public function get_sobrenome(){
            return $this->sobrenome;
        }

        public function set_usuario($x){
            $this->usuario = $x;
        }

        public function get_usuario(){
            return $this->usuario;
        }

        public function set_celular($x){
            $this->celular = $x;
        }

        public function get_celular(){
            return $this->celular;
        }

        public function set_email($x){
            $this->email = $x;
        }

        public function get_email(){
            return $this->email;
        }

        public function set_senha($x){
            $this->senha = $x;
        }

        public function get_senha(){
            return $this->senha;
        }

        public function set_nivel($x){
            $this->nivel = $x;
        }

        public function get_nivel(){
            return $this->nivel;
        }

        public function set_salario($x){
            $this->salario = $x;
        }

        public function get_salario(){
            return $this->salario;
        }

        public function set_ativo($x){
            $this->ativo = $x;
        }

        public function get_ativo(){
            return $this->ativo;
        }

        public function set_data_contratacao($x){
            $this->data_contratacao = $x;
        }

        public function get_data_contratacao(){
            return $this->data_contratacao;
        }

        public function set_data_nascimento($x){
            $this->data_nascimento = $x;
        }

        public function get_data_nascimento(){
            return $this->data_nascimento;
        }

        public function set_data_cadastro($x){
            $this->data_cadastro = $x;
        }

        public function get_data_cadastro(){
            return $this->data_cadastro;
        }


    }
?>