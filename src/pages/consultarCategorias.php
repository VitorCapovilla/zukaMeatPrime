<?php 
    require_once ("../include/header.php");
    require_once("../include/functions.php");
    require_once("../include/sessions.php"); 
    require_once("../include/datetime.php");
    require_once("../model/categoriaDTO.php");
    require_once("../model/categoriaDAO.php"); 
    require_once("../controller/AutenticacaoController.php");
    echo $nivel;

    $objCategoriaDAO = new CategoriaDAO();
    $auth = new AutenticacaoController();
    if($nivel <= 0){
        Redirect_to("../view/");
    }

    if(!isset($_GET["ativo"])){
        Redirect_to("consultarCategorias.php?ativo=1");
    }else{
        $ativo = $_GET["ativo"];
    }


    switch($ativo){
        default:
            $lstCategorias = $objCategoriaDAO->obter_todos_ativados();
            break;
        case "0":
            $lstCategorias = $objCategoriaDAO->obter_todos_desativados();
            break;
    }
?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-5 mt-5">
                    <div class="col-6">
                        <a href="?ativo=1" style="width: 100%" class='btn <?php if ($ativo == 1) echo "btn-success"; ?>'>Ativos &nbsp;<i class='fas fa-check'></i></a>
                    </div>

                    <div class="col-6">
                        <a href="?ativo=0" style="width: 100%" class='btn <?php if ($ativo == 0) echo "btn-danger"; ?>'>Inativos &nbsp;<i class="fas fa-power-off"></i></a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class='text-center'>Código</th>
                            <th class='text-center'>Título</th>
                            <th class='text-center'>Autor</th>
                            <th class='text-center'>Última Alteração</th>
                            <th style="width: 305px !important"></th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstCategorias as $objCategoria){
                                echo "<tr>
                                        <td class='text-center'><b> #" . $objCategoria->get_codigo() . "</b></td>
                                        <td class='text-center'> " . $objCategoria->get_nome() . "</td>
                                        <td class='text-center'> " . $objCategoria->get_autor()->get_nome()." - (".$objCategoria->get_autor()->get_email().")"  . "</td>
                                        <td class='text-center'> " . date_format(date_create($objCategoria->get_data_criacao()), "d/m/Y - h:m:s")  . "</td>
                                        <td class='text-center'>
                                            <a href='categoria.php?codigo=" . $objCategoria->get_codigo() . "'><span class=\"btn btn-primary\">Editar</span></a>";
                                            if ($_GET['ativo'] == 1){
                                                echo "<a href='../controller/desativarCategoria.php?codigo=". $objCategoria->get_codigo() . "' class=\"btn btn-danger\"  style=\"width: 150px; margin:4px; margin-top:5px\"><span><i class='fas fa-toggle-off'></i>&nbsp;Inativar</span></a>";
                                            }else{
                                                echo "<a href='../controller/ativarCategoria.php?codigo=". $objCategoria->get_codigo() . "' class=\"btn btn-success\"  style=\"width: 150px; margin:4px; margin-top:5px\"><span><i class='fas fa-toggle-on'></i>&nbsp;Ativar</span></a>";
                                            }
                                        echo "
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