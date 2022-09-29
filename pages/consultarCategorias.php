<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/datetime.php"); ?>
<?php require_once("../model/categoriaDTO.php"); ?>
<?php require_once("../model/categoriaDAO.php"); ?>

<?php
    $objCategoriaDao = new CategoriaDAO();
    $lstCategorias = $objCategoriaDao->obter_todos();
?>

<?php require_once ("../include/header.php"); ?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class='text-center'>Código</th>
                            <th>Título</th>
                            <th class='text-center'>Autor</th>
                            <th class='text-center'>Criada em</th>
                            <th class='text-center'>Ação</div></th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstCategorias as $objCategoria){
                                echo "<tr>
                                        <td class='text-center'> #" . $objCategoria->get_codigo() . "</td>
                                        <td> " . $objCategoria->get_titulo() . "</td>
                                        <td class='text-center'> " . $objCategoria->get_autor()  . "</td>
                                        <td class='text-center'> " . $objCategoria->get_datahora()  . "</td>
                                        <td class='text-center'>
                                            <a href='categoria.php?codigo=" . $objCategoria->get_codigo() . "'><span class=\"btn btn-primary\">Editar</span></a>
                                            <a href='../controller/ExcluirCategoria.php?codigo=" . $objCategoria->get_codigo() . "'<span class=\"btn btn-danger\">Delete</span></a>
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
<div style="bottom: 0; position: fixed; width: 100%">
    <?php 
        require_once("../include/footer.php");     
    ?>
</div>