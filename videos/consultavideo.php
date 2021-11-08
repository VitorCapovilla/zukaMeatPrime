<?php require_once("../include/functions.php"); ?>
<?php require_once("../include/sessions.php"); ?>
<?php require_once("../include/datetime.php"); ?>
<?php require_once("video.php"); ?>
<?php require_once("videoDAO.php"); ?>

<?php
    $objvideoDao = new VideoDAO();
    $lstvideo = $objvideoDao->obter_todos();
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
                            <th>Video</th>
                            <th>descricao</th>
                            <th>Autor</th>
                            <th>Data e Hora</th>
                            <th>Ação</div></th>
                            <th>Visualizar</th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstvideo as $objvideo){
                                echo "<tr>
                                        <td>#</td>
                                        <td> " . $objvideo->get_codigo() . "</td>
                                        <td> " . $objvideo->get_titulo() . "</td>
                                        <td> " . $objvideo->get_video() . "</td>
                                        <td> " . $objvideo->get_descricao() . "</td>
                                        <td> " . $objvideo->get_autor()  . "</td>
                                        <td> " . $objvideo->get_datahora()  . "</td>
                                        <td>
                                            <a href=\"formalterarvideo.php?codigo=" . $objvideo->get_codigo() . "\"><span class=\"btn btn-primary\">Editar</span></a>
                                            <a href=\"Excluirvideo.php?codigo=" . $objvideo->get_codigo() . "\"><span class=\"btn btn-danger\">Delete</span></a>
                                        </td>
                                        <td><a href=\"#\"><span class=\"btn btn-warning\">Visualizar</span></a></td>
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