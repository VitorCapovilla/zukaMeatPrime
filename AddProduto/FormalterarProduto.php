<?php
require_once("../include/sessions.php");
require_once("../include/header.php"); 
require_once("../include/functions.php");
require_once("../include/datetime.php");
require_once("../Categoria/Categoria.php");
require_once("../Categoria/CategoriaDAO.php"); 
require_once("produto.php");
require_once("ProdutoDAO.php");
?>

<?php

    $codigo = $_GET['codigo'];
    $dao = new ProdutoDAO();
    $objProduto = $dao->obter($codigo);
?>

<!-- Inicio-Main -->
<main>
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height: 725px;">
            <?php 

            echo ErrorMessage(); 
            echo SuccessMessage(); 
            
            ?>
                <form action="AlterarProduto.php" method="POST">
                    <div class="card mb-3 bg-secondary">
                        <div class="card-header text-light">
                            <h1><b>Adicionar novo Produto</b></h1>
                        </div>
                        <div class="card-body bg-dark">
                            <!-- Código Do Produto -->
                            <div class="form-group">
                                <label for="Codigo"><span class="text-light InfoCampo"> Código do produto:</span></label>
                                <input readonly class="form-control" type="text" name="Codigo" id="Codigo" placeholder="Digite o título aqui" value="<?php echo $objProduto->get_codigo();?>">
                            </div>
                            <br>
                            <!-- Titulo do produto -->
                            <div class="form-group">
                                <label for="Titulo"><span class="text-light InfoCampo"> Título do produto:</span></label>
                                <input class="form-control" type="text" name="Titulo" id="Titulo" placeholder="Digite o título aqui" value="<?php echo $objProduto->get_titulo();?>">
                            </div>
                            <br>
                            <!-- Escolher a Categoria -->
                            <div class="form-group">
                                <label for="TituloCat"><span class="text-light InfoCampo"> Categoria:</span></label>
                                <select class="form-control" id="TituloCategoria" name="TituloCategoria">
                                    <?php

                                        $objCategoriaDao = new CategoriaDAO();
                                        $lstCategorias = $objCategoriaDao->obter_todos();

                                        foreach($lstCategorias as $objCategoria){
                                            echo "<option> " . $objCategoria->get_titulo() . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <!-- Selecionar uma imagem -->
                            <div class="form-group">
                                <label for="image"><span class="text-light InfoCampo"> Selecione uma Imagem:</span></label>
                                <input reandonly class="form-control" type="file" name="image" id="image" accept="image/*">
                            </div>
                            <br>
                            <!-- Peso do produto -->
                            <div class="form-group">
                                <label for="Peso"><span class="text-light InfoCampo"> Peso do produto (KG):</span></label>
                                <input class="form-control" type="text" name="Peso" id="Peso" placeholder="Digite o peso aqui:" value="<?php echo $objProduto->get_peso();?>">
                            </div>
                            <br>
                            <!-- Preço do Produto -->
                            <div class="form-group">
                                <label for="Preco"><span class="text-light InfoCampo"> Preço do produto:</span></label>
                                <input class="form-control" type="text" name="Preco" id="Preco" placeholder="Digite o preço aqui:" value="<?php echo $objProduto->get_preco();?>">
                            </div>
                            <br>
                            <!-- Descrição do produto -->
                            <div class="form-group">
                                <label for="descricao"><span class="text-light InfoCampo"> Descrição do produto:</span></label>
                               <input class="form-control" name="descricao" id="descricao" placeholder="Digite a descrição do produto:" value="<?php echo $objProduto->get_descricao();?>">
                            </div>
                            <br>
                            <!-- Botões -->
                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <a href="ConsultaProduto.php" class="col btn btn-warning btn-block" style="margin: 1rem 0px 0px 0px;">Voltar</a>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <button type="submit" name="Enviar" class="btn btn-success btn-block" style="margin: 1rem 0px 0px 0px;">
                                        Alterar
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