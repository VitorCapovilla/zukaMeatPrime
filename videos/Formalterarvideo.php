<?php
require_once("../include/sessions.php");
require_once("../include/header.php"); 
require_once("../include/functions.php");
require_once("../include/datetime.php");
require_once("video.php");
require_once("videoDAO.php");
?>
<?php

    $codigo = $_GET['codigo'];
    $dao = new VideoDAO();
    $objvideo = $dao->obter($codigo);
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
                <form action="Alterarvideo.php" method="POST">
                    <div class="card mb-3 bg-secondary">
                        <div class="card-header text-light">
                            <h1><b>Adicionar novo vídeo</b></h1>
                        </div>
                        <div class="card-body bg-dark">
                            <!-- Código Do vídeo -->
                            <div class="form-group">
                                <label for="Codigo"><span class="text-light InfoCampo"> Códio do vídeo:</span></label>
                                <input readonly class="form-control" type="text" name="Codigo" id="Codigo" placeholder="Digite o título aqui" value="<?php echo $objvideo->get_codigo();?>">
                            </div>
                            <br>
                            <!-- Titulo do vídeo -->
                            <div class="form-group">
                                <label for="Titulo"><span class="text-light InfoCampo"> Título do vídeo:</span></label>
                                <input class="form-control" type="text" name="Titulo" id="Titulo" placeholder="Digite o título aqui" value="<?php echo $objvideo->get_titulo();?>">
                            </div>
                            <br>
                            <!-- Selecionar uma imagem -->
                            <div class="form-group">
                                <label for="video"><span class="text-light InfoCampo"> Selecione um vídeo:</span></label>
                                <input class="form-control" type="file" name="video" id="video" accept="video/*" value="<?php echo $objvideo->get_video();?>">
                            </div>
                            <br>
                            <!-- Descrição do vídeo -->
                            <div class="form-group">
                                <label for="descricao"><span class="text-light InfoCampo"> Descrição do vídeo:</span></label>
                                <input class="form-control" name="descricao" id="descricao" placeholder="Digite a descrição do produto:" value="<?php echo $objvideo->get_descricao();?>"></textarea>
                            </div>
                            <br>
                            <!-- Botões -->
                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto mb-2">
                                    <a href="Consultavideo.php" class="col btn btn-warning btn-block" style="margin: 1rem 0px 0px 0px;">Voltar</a>
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