<?php 
    require_once("../include/functions.php");
    require_once("../include/sessions.php");
    require_once("../include/datetime.php");
    require_once("../Categoria/Categoria.php");
    require_once("../Categoria/CategoriaDAO.php"); 
    require_once("produto.php");
    require_once("produtoDAO.php"); 
?>

<!-- Incluindo o header -->
<?php require_once ("../include/header.php"); ?>

<!-- Inicio-Main -->
<script>
        $(document).ready(function () {
            $('#Preco').maskMoney({prefix: "R$ ", decimal: ",", thousands: "."});
        });
    </script>
<main>
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height: 725px;">
            <?php 

            echo ErrorMessage(); 
            echo SuccessMessage(); 
            
            ?>
                <form action="NovoProduto.php" method="POST">
                    <div class="card mb-3 bg-secondary">
                        <div class="card-header text-light">
                            <h1><b>Adicionar novo Produto</b></h1>
                        </div>
                        <div class="card-body bg-dark">
                            <!-- Titulo do produto -->
                            <div class="form-group">
                                <label for="Titulo"><span class="text-light InfoCampo"> Título do produto:</span></label>
                                <input class="form-control" type="text" name="Titulo" id="Titulo" placeholder="Digite o título aqui">
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
                                <input class="form-control" type="file" name="image" id="image" accept="image/*">
                            </div>
                            <br>
                            <!-- Peso do produto -->
                            <div class="form-group">
                                <label for="Peso"><span class="text-light InfoCampo"> Peso do produto (KG):</span></label>
                                <input class="form-control" type="text" name="peso" id="Peso" placeholder="Digite o peso aqui:">
                            </div>
                            <br>
                            <!-- Preço do Produto -->
                            <div class="form-group">
                                <label for="Preco"><span class="text-light InfoCampo"> Preço do produto:</span></label>
                                <input class="form-control" type="text" name="preco" id="Preco" placeholder="Digite o preço aqui:">
                            </div>
                            <br>
                            <!-- Descrição do produto -->
                            <div class="form-group">
                                <label for="descricao"><span class="text-light InfoCampo"> Descrição do produto:</span></label>
                               <textarea class="form-control" name="descricao" id="descricao" cols="8" rows="7" placeholder="Digite a descrição do produto:"></textarea>
                            </div>
                            <br>
                            <!-- Botões -->
                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <a href="../PainelADM/PainelADM.html" class="col btn btn-warning btn-block" style="margin: 1rem 0px 0px 0px;">Voltar</a>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <button type="submit" name="Enviar" class="btn btn-success btn-block" style="margin: 1rem 0px 0px 0px;">
                                        Adicionar
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