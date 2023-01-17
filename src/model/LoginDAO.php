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
			$meu_comando = $this->con->query("SELECT CODIGO, USERNAME, PASSWORD, NIVEL, NOME FROM USUARIOS WHERE USERNAME = '" . $login->get_username() . "' AND ATIVO = '1';");

			if($linha = $meu_comando->fetch(PDO::FETCH_ASSOC)) {
				if (BCrypt::check($login->get_password(), $linha["PASSWORD"])) {
					return new sessionDTO($linha["CODIGO"], $linha["NIVEL"], $linha["NOME"]);
				}
			}

			return new sessionDTO(-1, -1, -1);
		}
	}

?>