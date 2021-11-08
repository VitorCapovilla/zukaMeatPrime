<?php 
require_once("../include/functions.php");
require_once("../include/sessions.php");
require_once("../include/datetime.php");
require_once("Categoria.php");
require_once("CategoriaDAO.php"); 
?>

<?php
    if(isset($_POST["Enviar"])){
        $Categoria = $_POST["TituloCat"];
        $Admin = "MeatAdmin";

        if(empty($Categoria)){
            $_SESSION["ErrorMessage"]= "O campo deve estar preenchido!";
            Redirect_to("NovaCategoria.php");
            return;
        }
        
        if(strlen($Categoria)<3){
            $_SESSION["ErrorMessage"]= "O campo deve conter mais de 3 caracteres";
            Redirect_to("NovaCategoria.php");
            return;
        }
        
        if(strlen($Categoria)>49){
            $_SESSION["ErrorMessage"]= "O campo não pode conter mais de 50 caracteres";
            Redirect_to("NovaCategoria.php");
            return;
        }

        $objCategoriaDao = new CategoriaDAO();
        $objCategoria = new Categoria();

        $objCategoria->set_titulo($Categoria);
        $objCategoria->set_autor($Admin);
        $objCategoria->set_datahora($DateTime);

        if ($objCategoriaDao->inserir($objCategoria)){
            $_SESSION["SuccessMessage"]="Categoria adicionada com sucesso!";
            Redirect_to("NovaCategoria.php");
        }else{
            $_SESSION["ErrorMessage"]="Algo deu errado!";
            Redirect_to("NovaCategoria.php");
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
                <form class="" action="NovaCategoria.php" method="POST">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h1 class="">Adicionar nova categoria</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="TituloCat"><span class="InfoCampo"> Título da nova categoria:</span></label>
                                <input class="form-control" type="text" name="TituloCat" id="TituloCat" placeholder="Digite o título aqui" value="">
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <a href="../PainelADM/PainelADM.html" class="col btn btn-warning btn-block" style="margin: 1rem 0px 0px 0px;">Voltar</a>
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