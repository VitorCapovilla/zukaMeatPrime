<?php 
require_once("../include/functions.php");
require_once("../include/sessions.php");
require_once("../include/datetime.php");
require_once("Carrossel.php");
require_once("CarrosselDAO.php"); 
?>
<?php
    if(isset($_POST["Enviar"])){
        $Imagem = $_POST["carrossel"];
        $Admin = "MeatAdmin";

        if(empty($Imagem)){
            $_SESSION["ErrorMessage"]= "Selecione uma imagem para adicionar.";
            Redirect_to("NovoProduto.php");
            return;
        }

        $objCarrosselDao = new CarrosselDAO();
        $objcarrossel = new Carrossel();

        $objcarrossel->set_imagem($Imagem);
        $objcarrossel->set_autor($Admin);
        $objcarrossel->set_datahora($DateTime);


        if ($objCarrosselDao->inserir($objcarrossel)){
            $_SESSION["SuccessMessage"]="Produto adicionada com sucesso!";
            Redirect_to("NovoCarrossel.php");
        }else{
            $_SESSION["ErrorMessage"]="Algo deu errado!";
            Redirect_to("NovoCarrossel.php");
        }
    }
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
                <form action="NovoCarrossel.php" method="POST">
                    <div class="card mb-3 bg-secondary">
                        <div class="card-header text-light">
                            <h1><b>Adicionar novo Carrossel</b></h1>
                        </div>
                        <div class="card-body bg-dark">
                            <!-- Titulo do produto -->
                            <div class="form-group">
                            <br>
                            <!-- Selecionar uma imagem -->
                            <div class="form-group">
                                <label for="image"><span class="text-light InfoCampo"> Selecione uma imagem para colocar no carrossel:</span></label>
                                <input class="form-control" type="file" name="carrossel" id="image" accept="image/*">
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