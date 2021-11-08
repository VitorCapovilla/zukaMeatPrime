<?php
    class Video{
        private $codigo;
        private $titulo;
        private $video;
        private $descricao;
        private $autor;
        private $datahora;

        public function set_codigo($x){
            $this->codigo = $x;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_titulo($x){
            $this->titulo=$x;
        }

        public function get_titulo(){
            return $this->titulo;
        }

        public function set_video($x){
            $this->video = $x;
        }

        public function get_video(){
            return $this->video;
        }

        public function set_descricao($x){
            $this->descricao = $x;
        }

        public function get_descricao(){
            return $this->descricao;
        }

        public function set_autor($x){
            $this->autor = $x;
        }

        public function get_autor(){
            return $this->autor;
        }

        public function set_datahora($x){
            $this->datahora = $x;
        }

        public function get_datahora(){
            return $this->datahora;
        }
    }

    ?>