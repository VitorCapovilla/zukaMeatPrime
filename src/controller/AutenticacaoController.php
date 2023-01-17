<?php
	require_once("../model/SessionDTO.php");
	require_once("../model/LoginDTO.php");
	require_once("../model/LoginDAO.php");

	class AutenticacaoController {
		private $dao = null;

		function __construct() {
			$this->dao = new loginDAO();
		}

		public function autenticar($login) {
			$objSession = $this->dao->authenticate($login);

			if ($objSession->get_codigo() != -1) {
				$this->iniciar_sessao($objSession);
				return true;
			}

			return false;
		}

		private function iniciar_sessao($objSession) {
			session_start();

			$_SESSION['codigoSessaoInvoice'] = $objSession->get_codigo();
			$_SESSION['nivelSessaoInvoice'] = $objSession->get_nivel();
			$_SESSION['usernameSessaoInvoice'] = $objSession->get_username();
		}

		public function obter_sessao() {
			if (!isset($_SESSION)) {
				session_start();
			}

			if (!$this->verificar_sessao())
				return;

			return new sessionDTO($_SESSION['codigoSessaoInvoice'], $_SESSION['nivelSessaoInvoice'], $_SESSION['usernameSessaoInvoice']);
		}

		public function ecerrar_sessao() {
			if (!isset($_SESSION)) {
				session_start();
			}

			session_unset();
			session_destroy();

			$this->go_to_auth();
		}

		public function verificar_sessao() {
			if (!isset($_SESSION)) {
				session_start();
			}

			if (!isset($_SESSION['codigoSessaoInvoice'])) {
				$this->go_to_auth();
				return false;
			}

			return true;
		}

		public function verificar_nivel($nivel) {
			if (!isset($_SESSION)) {
				session_start();
			}

			if (!isset($_SESSION['nivelSessaoInvoice'])) {
				$this->go_to_auth();
				return false;
			}

			if ($_SESSION['nivelSessaoInvoice'] < $nivel){
				$this->go_to_index();
				return false;
			}

			return true;
		}

		public function verificar_login() {
			if (!isset($_SESSION)) {
				session_start();
			}

			if (isset($_SESSION['codigoSessaoInvoice'])) {
				header('location: ../view/index.php');
			}

		}

		private function go_to_index() {
			header('location: ../view/index.php');
		}

		private function go_to_auth() {
			header('location: ../view/login.php');
		}
	}


?>