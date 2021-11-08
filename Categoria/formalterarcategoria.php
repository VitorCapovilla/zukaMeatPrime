<?php
require_once("../include/sessions.php");
require_once("../include/header.php"); 
require_once("../include/functions.php");
require_once("../include/datetime.php");
require_once("Categoria.php");
require_once("CategoriaDAO.php");
?>
<?php

    $codigo = $_GET['codigo'];
    $dao = new CategoriaDAO();
    $objCategorias = $dao->obter($codigo);
?>

<!-- Incluindo o header -->
<?php require_once ("../include/header.php"); ?>

<!-- Inicio-Main -->

<main>
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height: 725px;">
            <?php 

            echo ErrorMessage(); 
            echo SuccessMessage(); 
            
            ?>
                <form action="AlterarCategoria.php" method="POST">
                    <div class="card mb-3 bg-secondary">
                        <div class="card-header text-light">
                            <h1><b>Alterar Categoria</b></h1>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="codigo"><span class="InfoCampo text-light"> Código:</span></label>
                                <input readonly class="form-control" type="text" name="codigo" id="codigo" value = "<?php echo $objCategorias->get_codigo();?>">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="TituloCat"><span class="InfoCampo text-light"> Mudar Título:</span></label>
                                <input class="form-control" type="text" name="titulo" id="TituloCat" placeholder="Digite o título aqui" value="<?php echo $objCategorias->get_titulo(); ?>">
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <a href="ConsultaCategoria.php" class="col btn btn-warning btn-block" style="margin: 1rem 0px 0px 0px;">Voltar</a>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <button type="submit" name="Enviar" class="btn btn-success btn-block" style="margin: 1rem 0px 0px 0px;">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Fim-Main -->

<!-- Incluindo o footer -->
<?php require_once("../include/footer.php"); ?>