<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/datetime.php"); ?>
<?php require_once("Categoria.php"); ?>
<?php require_once("CategoriaDAO.php"); ?>

<?php
    $objCategoriaDao = new CategoriaDAO();
    $lstCategorias = $objCategoriaDao->obter_todos();
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
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Criada em</th>
                            <th>Ação</div></th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstCategorias as $objCategoria){
                                echo "<tr>
                                        <td>#</td>
                                        <td> " . $objCategoria->get_codigo() . "</td>
                                        <td> " . $objCategoria->get_titulo() . "</td>
                                        <td> " . $objCategoria->get_autor()  . "</td>
                                        <td> " . $objCategoria->get_datahora()  . "</td>
                                        <td>
                                            <a href='formalterarcategoria.php?codigo=" . $objCategoria->get_codigo() . "'><span class=\"btn btn-primary\">Editar</span></a>
                                            <a href='ExcluirCategoria.php?codigo=" . $objCategoria->get_codigo() . "'<span class=\"btn btn-danger\">Delete</span></a>
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