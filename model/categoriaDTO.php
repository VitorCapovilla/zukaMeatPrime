<?php
    class categoriaDTO{
        private $codigo;
        private $titulo;
        private $autor;
        private $datahora;

        public function set_codigo($codigo){
            $this->codigo = $codigo;
        }

        public function get_codigo(){
            return $this->codigo;
        }

        public function set_titulo($titulo){
            $this->titulo=$titulo;
        }

        public function get_titulo(){
            return $this->titulo;
        }

        public function set_autor($autor){
            $this->autor = $autor;
        }

        public function get_autor(){
            return $this->autor;
        }

        public function set_datahora($datahora){
            $this->datahora = $datahora;
        }

        public function get_datahora(){
            return $this->datahora;
        }
    }

    ?>