<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/datetime.php"); ?>
<?php require_once("Carrossel.php"); ?>
<?php require_once("CarrosselDAO.php"); ?>

<?php
    $objCarrosselDao = new CarrosselDAO();
    $lstCarrossel = $objCarrosselDao->obter_todos();
?>

<!-- Incluindo o header -->
<?php require_once ("../include/header.php"); ?>

<!-- Inicio-Main -->

<main>
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height: 725px;">
                <table class="table table-striped">
                    <thead class="table-dark" style="justify-items:center;">
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Imagem</th>
                            <th>Autor</th>
                            <th>Data e Hora</th>
                            <th>Ação</div></th>
                            <th>Visualizar</th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstCarrossel as $objcarrossel){
                                echo "<tr>
                                        <td>#</td>
                                        <td> " . $objcarrossel->get_codigo() . "</td>
                                        <td> " . $objcarrossel->get_imagem() . "</td>
                                        <td> " . $objcarrossel->get_autor()  . "</td>
                                        <td> " . $objcarrossel->get_datahora()  . "</td>
                                        <td>
                                            <a href=\"ExcluirCarrossel.php?codigo=" . $objcarrossel->get_codigo() . "\"><span class=\"btn btn-danger\">Delete</span></a>
                                            <a href=\"formalterarcarrossel.php?codigo=" . $objcarrossel->get_codigo() . "\"><span class=\"btn btn-primary\">Alterar</span></a>
                                        </td>
                                        <td><a href=\"../index.php\"><span class=\"btn btn-warning\">Visualizar</span></a></td>
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