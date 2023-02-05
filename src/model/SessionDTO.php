<?php

	class sessionDTO {
		private $codigo;
		private $nivel;
		private $email;
		private $nome;

        public function __construct($codigo, $nivel, $email, $nome){
            $this->codigo = $codigo;
            $this->nivel  = $nivel;
			$this->email = $email;
			$this->nome = $nome;
        }

		public function get_codigo() {
			return $this->codigo;
		}

		public function set_codigo($value) {
			$this->codigo = $value;
		}

		public function get_nivel() {
			return $this->nivel;
		}

		public function set_nivel($value) {
			$this->nivel = $value;
		}

		public function set_email($value) {
			$this->email = $value;
		}

		public function get_email(){
			return $this->email;
		}

		public function set_nome($value){
			$this->nome = $value;
		}

		public function get_nome(){
			return $this->nome;
		}
	}

?>