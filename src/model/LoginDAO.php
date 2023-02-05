<?php
	require_once("../db/bd_gerenciador.php");
	require_once("../model/LoginDTO.php");
	require_once("../model/SessionDTO.php");
	require_once("../utils/BCrypt.php");

	class loginDAO {
		private $con;

		function __construct() {
			$this->con = GerenciadoraDeConexoes::obter_conexao();
		}

		function authenticate($login) {
			$meu_comando = $this->con->query("SELECT CODIGO, USUARIO, SENHA, NIVEL, NOME, EMAIL FROM USUARIOS WHERE EMAIL = '" . $login->get_email() . "' AND ATIVO = '1';");

			if($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)) {
				$teste = BCrypt::check($login->get_password(), $linha["SENHA"]);
				if (BCrypt::check($login->get_password(), $linha["SENHA"])) {
					return new sessionDTO($linha["CODIGO"], $linha["NIVEL"], $linha["EMAIL"], $linha["NOME"]);
				}
			}

			return new sessionDTO(-1, -1, -1, -1);
		}
	}

?>