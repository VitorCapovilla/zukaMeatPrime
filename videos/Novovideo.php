<?php 
require_once("../include/functions.php");
require_once("../include/sessions.php");
require_once("../include/datetime.php");
require_once("video.php");
require_once("videoDAO.php"); 
?>

<?php
    if(isset($_POST["Enviar"])){
        $Titulovideo = $_POST["Titulovideo"];
        $Video = $_POST["arqvideo"];
        $videodesc = $_POST["videoDescricao"];
        $Admin = "MeatAdmin";

        if(empty($Titulovideo)){
            $_SESSION["ErrorMessage"]= "O título deve estar preenchido!";
            Redirect_to("Novovideo.php");
            return;
        }
        
        if(strlen($Titulovideo)<3){
            $_SESSION["ErrorMessage"]= "O título deve conter mais de 3 caracteres.";
            Redirect_to("Novovideo.php");
            return;
        }
        
        if(strlen($Titulovideo)>49){
            $_SESSION["ErrorMessage"]= "O título não pode conter mais de 50 caracteres.";
            Redirect_to("Novovideo.php");
            return;
        }

        if(empty($videodesc)){
            $_SESSION["ErrorMessage"]= "A descrição deve estar preenchida";
            Redirect_to("Novovideo.php");
            return;
        }
        
        if(strlen($videodesc)<3){
            $_SESSION["ErrorMessage"]= "A descrição deve conter mais de 3 caracteres.";
            Redirect_to("Novovideo.php");
            return;
        }
        
        if(strlen($videodesc)>99){
            $_SESSION["ErrorMessage"]= "A descrição não pode conter mais de 100 caracteres.";
            Redirect_to("Novovideo.php");
            return;
        }

        $objVideoDao = new VideoDAO();
        $objvideo = new Video();

        $objvideo->set_titulo($Titulovideo);
        $objvideo->set_video($Video);
        $objvideo->set_descricao($videodesc);
        $objvideo->set_autor($Admin);
        $objvideo->set_datahora($DateTime);

        if ($objVideoDao->inserir($objvideo)){
            $_SESSION["SuccessMessage"]="Vídeo adicionada com sucesso!";
            Redirect_to("Novovideo.php");
        }else{
            $_SESSION["ErrorMessage"]="Algo deu errado!";
            Redirect_to("Novovideo.php");
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
                <form class="" action="Novovideo.php" method="POST">
                    <div class="card mb-3 bg-secondary">
                        <div class="card-header">
                            <h1 class="text-light"><b>Adicionar novo Vídeo</b></h1>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="Titulovideo"><span class="text-light InfoCampo"> Título do novo vídeo:</span></label>
                                <input class="form-control" type="text" name="Titulovideo" id="Titulovideo" placeholder="Digite o título aqui" value="">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="arqvideo"><span class="text-light InfoCampo"> Selecione um vídeo:</span></label>
                                <input class="form-control" type="file" name="arqvideo" id="arqvideo" accept="video/*">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="videoDescricao"><span class="text-light InfoCampo"> Descrição do vídeo:</span></label>
                               <textarea class="form-control" name="videoDescricao" id="videoDescricao" cols="8" rows="7" placeholder="Digite a descrição do Vídeo:"></textarea>
                            </div>
                            <br>
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