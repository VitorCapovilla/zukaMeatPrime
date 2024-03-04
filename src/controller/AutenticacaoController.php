<?php
	//Niveis:
	// 0 = Cliente
	// 1 = Administrator
	// 2 = Gerente
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

			if ($objSession->get_codigo() >= 0) {
				$this->iniciar_sessao($objSession);
				return true;
			}

			return false;
		}

		private function iniciar_sessao($objSession) {
			session_start();

			$_SESSION['codigoSessaoZukaMeatPrime'] = $objSession->get_codigo();
			$_SESSION['nomeSessaoZukaMeatPrime'] = $objSession->get_nome();
			$_SESSION['nivelSessaoZukaMeatPrime'] = $objSession->get_nivel();
			$_SESSION['usernameSessaoZukaMeatPrime'] = $objSession->get_email();
		}

		public function obter_sessao() {
			if (isset($_SESSION)) {
				return new sessionDTO($_SESSION['codigoSessaoZukaMeatPrime'], $_SESSION['nivelSessaoZukaMeatPrime'], $_SESSION['usernameSessaoZukaMeatPrime'], $_SESSION['nomeSessaoZukaMeatPrime']);
			}
		}

		public function nao_logado($logado){
			if($logado == 0){
				return new sessionDTO($_SESSION['codigoSessaoZukaMeatPrime'] = null, $_SESSION['nivelSessaoZukaMeatPrime'] = null, $_SESSION['usernameSessaoZukaMeatPrime'] = null, $_SESSION['nomeSessaoZukaMeatPrime'] = null);
			}
		}

		public function ecerrar_sessao() {
			if (!isset($_SESSION)) {
				session_start();
			}

			session_unset();
			session_destroy();

			go_to_index();

		}

		public function verificar_sessao(){
			if (isset($_SESSION)) {
				return false;
			}else{
				return true;
			}
		}

		public function verificar_login() {
			if (!isset($_SESSION)) {
				session_start();
			}

			if (isset($_SESSION['codigoSessaoZukaMeatPrime'])) {
				header('location: ../view/index.php');
			}

		}

		private function go_to_index() {
			header('location: ../view/');
		}
	}


?>