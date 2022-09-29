<?php 
  require_once("../include/functions.php");
  require_once("../include/sessions.php");
  require_once("../include/datetime.php");
  require_once("../model/categoriaDTO.php");
  require_once("../model/categoriaDAO.php"); 
?>

<?php
  $categoriaDTO = new categoriaDTO;
  $categoriaDAO = new categoriaDAO;
  
  error_reporting(0);
  
  if(isset($_GET["codigo"])){
    $codigo = ($_GET["codigo"]);
    try{
      $categoriaDTO = $categoriaDAO->obter($codigo);
    }catch(Exception $ex){
      Redirect_to("categoria.php");
    }
  }

  if(isset($_POST["Salvar"])){
    $codigo = $_POST["codigo"];
    $categoria = $_POST["nome_categoria"];
    $Admin = "MeatAdmin";

    if(empty($categoria)){
      $_SESSION["ErrorMessage"]= "O campo deve estar preenchido!";
      Redirect_to("categoria.php");
      return;
    }
    
    if(strlen($categoria)<3){
      $_SESSION["ErrorMessage"]= "O campo deve conter mais de 3 caracteres!";
      Redirect_to("categoria.php");
      return;
    }
    
    if(strlen($categoria)>49){
      $_SESSION["ErrorMessage"]= "O campo não pode conter mais de 50 caracteres!";
      Redirect_to("categoria.php");
      return;
    }

    $categoriaDTO->set_codigo($codigo);
    $categoriaDTO->set_titulo($categoria);
    $categoriaDTO->set_autor($Admin);
    $categoriaDTO->set_datahora($DateTime);

    if(($categoriaDTO->get_codigo()) == null || ($categoriaDTO->get_codigo() == "")){
      if($categoriaDAO->inserir($categoriaDTO)){
        $_SESSION["SuccessMessage"] = "Categoria salva com sucesso!";
        Redirect_to("categoria.php");
        return;
      }else{
        $_SESSION["ErrorMessage"]= "Erro ao salvar a categoria. Tente novamente ou contate um administrador!";
        Redirect_to("categoria.php");
        return;
      }

      $categoriaDTO = new categoriaDTO;
      echo "Salvei uma nova";
    }else{
      if($categoriaDAO->alterar($categoriaDTO)){
        $_SESSION["SuccessMessage"] = "Categoria alterada com sucesso!";
        Redirect_to("categoria.php");
        return;
      }else{
        $_SESSION["ErrorMessage"]= "Erro ao alterar a categoria. Tente novamente ou contate um administrador!";
        Redirect_to("categoria.php");
        return;
      }
    }
  }

?>

<!-- Incluindo o header -->
<?php require_once ("../include/header.php"); ?>

<!-- Inicio-Main -->

<main>
  <div class="container">
    <div class="row">
      <div class="offset-lg-1 col-lg-10">
        <?php 

          echo ErrorMessage(); 
          echo SuccessMessage();
            
        ?>
        <form class="" action="categoria.php" method="POST">
          <div class="card mb-3">
            <div class="card-header">
              <h1>Adicionar Nova Categoria</h1>
            </div>
            <div class="card-body">
              <div class="form-group">
                <input hidden type = "text" name = "codigo" value  = <?php echo '"' . $categoriaDTO->get_codigo() . '"'; ?>>

                <label for="nome_categoria"><span class="InfoCampo"> Título da Categoria:</span></label>
                <input class="form-control" type="text" name="nome_categoria" id="nome_categoria" value=<?php echo $categoriaDTO->get_titulo(); ?>>
              </div>
              <div class="row">
                <div class="d-grid gap-2 col-6 mx-auto">
                  <a href="../PainelADM/PainelADM.html" class="col btn btn-warning btn-block"
                    style="margin: 1rem 0px 0px 0px;">Voltar</a>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button type="submit" name="Salvar" class="btn btn-success btn-block"
                    style="margin: 1rem 0px 0px 0px;">
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
<div style="bottom: 0; position: fixed; width: 100%">
  <?php 
        require_once("../include/footer.php");     
    ?>
</div>