<?php
require_once("../include/sessions.php");
require_once("../include/header.php"); 
require_once("../include/functions.php");
require_once("../include/datetime.php");
require_once("Cadastro.php");
require_once("CadastroDAO.php");
?>
<?php

    $codigo = $_GET['codigo'];
    $dao = new ClienteDAO();
    $objcliente = $dao->obter($codigo);

?>
<div class="container">
    <div class="row">
        <div class="offset-lg-1 col-lg-10" style="min-height: 725px;">
                <?php 

                echo ErrorMessage(); 
                echo SuccessMessage(); 
                
                ?>
            <form action="AlterarCadastro.php" method="POST">
                <div class="mb-3">
                    <label for="codigo" class="form-label">Codigo</label>
                    <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $objcliente->get_codigo();?>">
                </div>
                <div class="mb-3">
                    <label for="Nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" id="Nome" value="<?php echo $objcliente->get_nome();?>">
                </div>
                <div class="mb-3">
                    <label for="Sobrenome" class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome" id="Sobrenome" value="<?php echo $objcliente->get_sobrenome();?>">
                </div>
                <div class="mb-3">
                    <label for="Datanasc" class="form-label">Data de Nascimento</label>
                    <input type="text" class="form-control" id="Datanasc" name="datanascimento" value="<?php echo $objcliente->get_datanasc();?>">
                </div>
                <div class="mb-3">
                    <label for="CPF" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="CPF" name="cpf" value="<?php echo $objcliente->get_cpf();?>">
                </div>
                <div class="mb-3">
                    <label for="Telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="Telefone" name="telefone" value="<?php echo $objcliente->get_telefone();?>">
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="email" aria-describedby="emailHelp" value="<?php echo $objcliente->get_email();?>">
                </div>
                <div class="mb-3">
                    <label for="Senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="Senha" name="senha" value="<?php echo $objcliente->get_senha();?>">
                </div>
                <div class="row">
                    <div class="d-grid gap-2 col-6 mx-auto mb-2">
                        <a href="../PainelADM/PainelADM.html" class="col btn btn-warning btn-block" style="margin: 1rem 0px 0px 0px;">Voltar</a>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mb-2">
                        <button type="submit" name="Enviar" class="btn btn-success btn-block" style="margin: 1rem 0px 0px 0px;">
                            Alterar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>