<?php
session_start();
// require_once('../db/bd_gerenciador.php');
require_once('conexao.php');


//Verificação de itens nulos
if(empty($_POST['email']) || empty($_POST['senha'])){
    header('Location: login.php');
    exit();
}

//Tratamento e armazenamento na variavel
$usuario = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//Vai verificar usuario digitado e no banco
$query = "select codigo, email from cliente where email = '{$usuario}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: ../paineluser/painelusuario.php');
    exit();
}else{
    header('Location: login.php');
}