<?php
    require_once("../controller/AutenticacaoController.php");

    $user = $_POST["Email"];
    $pwd = $_POST["Senha"];

    $login = new loginDTO();
    $login->set_email($user);
    $login->set_password($pwd);

    $controller = new AutenticacaoController();
    if($controller->autenticar($login)) {
    	header('location: ../view/index.php');
    } else {
    	header('location: ../view/login.php?error');
    }

?>