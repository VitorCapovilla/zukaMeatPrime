<?php 
    require_once("../include/functions.php");
    require_once("../include/sessions.php");
    require_once("../include/datetime.php");
    require_once("../model/categoriaDAO.php"); 
    require_once("../model/categoriaDTO.php"); 
    require_once("../controller/AutenticacaoController.php");
    require_once("../include/header.php");

    $objCategoriaDAO = new CategoriaDAO();
    $objCategoriaDTO = new CategoriaDTO();

    $auth = new AutenticacaoController();
    if($nivel <= 0){
        Redirect_to("../view/");
    }

    $codigoAdmin = $auth->obter_sessao()->get_codigo();
    $dateTime = date("Y-m-d H:m:s");
    $ativo = "1";
?>

<?php
    if(isset($_GET["codigo"])){

        $codigo = $_GET["codigo"];
        $objCategoriaDTO = $objCategoriaDAO->obter($_GET["codigo"]);
    
    }elseif(isset($_POST["Enviar"])){
        $codigo = $_POST["Codigo"];
        $categoria = $_POST["TituloCat"];

        if(empty($categoria)){
            $_SESSION["ErrorMessage"]= "O campo deve estar preenchido!";
            Redirect_to("Categoria.php");
            return;
        }
        
        if(strlen($categoria) < 3){
            $_SESSION["ErrorMessage"]= "O campo deve conter mais de 3 caracteres";
            Redirect_to("Categoria.php");
            return;
        }
        
        if(strlen($categoria) > 59 ){
            $_SESSION["ErrorMessage"]= "O campo não pode conter mais de 60 caracteres";
            Redirect_to("categoria.php");
            return;
        }

        $objCategoriaDTO->set_codigo($codigo);
        $objCategoriaDTO->set_nome($categoria);
        $objCategoriaDTO->set_autor($codigoAdmin);
        $objCategoriaDTO->set_data_criacao($dateTime);
        $objCategoriaDTO->set_ativo($ativo);

        if(($objCategoriaDTO->get_codigo() == null) || ($objCategoriaDTO->get_codigo() == "")){
            if ($objCategoriaDAO->inserir($objCategoriaDTO)){
                $_SESSION["SuccessMessage"]="Categoria adicionada com sucesso!";
                Redirect_to("categoria.php");
            }else{
                $_SESSION["ErrorMessage"]="Algo deu errado ao criar a categoria!";
                Redirect_to("categoria.php");
            }
            $objCategoriaDTO = new CategoriaDTO();
        }else{
            if($objCategoriaDAO->alterar($objCategoriaDTO)){
                $_SESSION["SuccessMessage"]="Categoria alterada com sucesso!";
                Redirect_to("categoria.php");
            }else{
                $_SESSION["ErrorMessage"]="Algo deu errado ao alterar a categoria!";
                Redirect_to("categoria.php");
            }
        }
    }
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
                <form class="" action="categoria.php" method="POST">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h1 class="">Adicionar nova categoria</h1>
                        </div>
                        <input hidden type = "text" name = "Codigo" value  = <?php echo '"' . $objCategoriaDTO->get_codigo() . '"'; ?>>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="TituloCat"><span class="InfoCampo"> Título da nova categoria:</span></label>
                                <input class="form-control" type="text" name="TituloCat" id="TituloCat" placeholder="Digite o título da nova categoria" value=<?php echo '"' . $objCategoriaDTO->get_nome() . '"'; ?>>
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <a href="consultarCategorias.php" class="col btn btn-warning btn-block" style="margin: 1rem 0px 0px 0px;">Voltar</a>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <button type="submit" name="Enviar" class="btn btn-success btn-block" style="margin: 1rem 0px 0px 0px;">
                                        Salvar
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