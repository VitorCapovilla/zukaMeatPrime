<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/datetime.php"); ?>
<?php require_once("Cadastro.php"); ?>
<?php require_once("CadastroDAO.php"); ?>

<?php
    $objClienteDAO = new ClienteDAO();
    $lstCliente = $objClienteDAO->obter_todos();
?>

<!-- Incluindo o header -->
<?php require_once ("../include/header.php"); ?>

<!-- Inicio-Main -->

<main>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12" style="min-height: 725px;">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Nome Completo</th>
                            <th>CPF</th>
                            <th>email</th>
                            <th>Ação</div></th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstCliente as $objCliente){
                                echo "<tr>
                                        <td>#</td>
                                        <td> " . $objCliente->get_codigo() . "</td>
                                        <td> " . $objCliente->get_nome() ." ". $objCliente->get_sobrenome() . "</td>
                                        <td> " . $objCliente->get_cpf() . "</td>
                                        <td> " . $objCliente->get_email() . "</td>
                                        <td>
                                        <a href= \"formalterarcadastro.php?codigo=" . $objCliente->get_codigo() . "\"><span class=\"btn btn-primary\">Editar</span></a>
                                            <a href= \"ExcluirCadastro.php?codigo=" . $objCliente->get_codigo() . "\"><span class=\"btn btn-danger\">Delete</span></a>
                                        </td>
                                    </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Fim-Main -->

<!-- Incluindo o footer -->
<?php require_once("../include/footer.php"); ?>