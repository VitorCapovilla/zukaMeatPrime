<?php
    class Cliente{
        private $codigo;
        private $nome;
        private $sobrenome;
        private $datanasc;
        private $cpf;
        private $telefone;
        private $email;
        private $senha;

        function set_codigo($x){
            $this->codigo = $x;
        }

        function get_codigo(){
            return $this->codigo;
        }

        function set_nome($x){
            $this->nome = $x;
        }

        function get_nome(){
            return $this->nome;
        }

        function set_sobrenome($x){
            $this->sobrenome=$x;
        }

        function get_sobrenome(){
            return $this->sobrenome;
        }

        function set_datanasc($x){
            $this->datanasc = $x;
        }

        function get_datanasc(){
            return $this->datanasc;
        }

        function set_cpf($x){
            $this->cpf=$x;
        }

        function get_cpf(){
            return $this->cpf;
        }

        function set_telefone($x){
            $this->telefone = $x;
        }

        function get_telefone(){
            return $this->telefone;
        }

        function set_email($x){
            $this->email = $x;
        }

        function get_email(){
            return $this->email;
        }

        function set_senha($x){
            $this->senha=$x;
        }
        
        function get_senha(){
            return $this->senha;
        }
    }
?>