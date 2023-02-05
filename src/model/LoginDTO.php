<?php

	class loginDTO {
		private $email;
		private $password;

		public function get_email() {
			return $this->username;
		}

		public function set_email($x) {
			$this->username = $x;
		}

		public function get_password() {
			return $this->password;
		}

		public function set_password($x) {
			$this->password = $x;
		}
	}

?>