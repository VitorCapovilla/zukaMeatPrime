<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/datetime.php"); ?>
<?php require_once("produto.php"); ?>
<?php require_once("produtoDAO.php"); ?>

<?php
    $objProdutoDao = new ProdutoDAO();
    $lstProdutos = $objProdutoDao->obter_todos();
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
                            <th>Título</th>
                            <th>Categoria</th>
                            <th>Imagem</th>
                            <th>Peso</th>
                            <th>Preco</th>
                            <th>Autor</th>
                            <th>Data e Hora</th>
                            <th>Ação</div></th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstProdutos as $objProduto){
                                echo "<tr>
                                        <td>#</td>
                                        <td> " . $objProduto->get_codigo() . "</td>
                                        <td> " . $objProduto->get_titulo() . "</td>
                                        <td> " . $objProduto->get_categoria() . "</td>
                                        <td> " . $objProduto->get_imagem() . "</td>
                                        <td> " . $objProduto->get_Peso() . "</td>
                                        <td> " . $objProduto->get_preco() . "</td>
                                        <td> " . $objProduto->get_autor()  . "</td>
                                        <td> " . $objProduto->get_datahora()  . "</td>
                                        <td>
                                        <a href= \"FormalterarProduto.php?codigo=" . $objProduto->get_codigo() . "\"><span class=\"btn btn-primary\">Editar</span></a>
                                            <a href= \"ExcluirProduto.php?codigo=" . $objProduto->get_codigo() . "\"><span class=\"btn btn-danger\">Delete</span></a>
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