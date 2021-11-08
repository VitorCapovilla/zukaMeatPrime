<?php 
require_once("../db/bd_gerenciador.php");
require_once("../Categoria/Categoria.php");
require_once("../Categoria/CategoriaDAO.php");
require_once("../include/functions.php"); 
require_once("../include/sessions.php"); 
require_once("../include/datetime.php"); 
require_once("../addProduto/produto.php"); 
require_once("../addProduto/produtoDAO.php"); 
require_once("../include/header.php");
require_once("../carrossel/carrosselDAO.php");
require_once("../carrossel/carrossel.php");
?>

<?php
    $objCategoriaDao = new CategoriaDAO();
    $lstCategorias = $objCategoriaDao->obter_todos();

    $objProdutoDao = new ProdutoDAO();
    $lstProdutos = $objProdutoDao->obter_todos();

    $objCarrosselDao = new CarrosselDAO();
    $lstCarrossel = $objCarrosselDao->obter_todos();
?>
    <!--Início Carrossel-->
    <header class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../Images/slides/banner2.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../Images/slides/banner1.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../Images/slides/banner3.png" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
        <hr class="mt-3">
    </header>
    <main>
        <nav name="menu secundario" class="navbar navbar-expand-lg navbar-dark boder-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-md">
                        <form class="justify-content-center justify-content-md-start mb-3 mb-md-0">
                            <div class="input-group input-group-sm">
                                <form action="formconsultarproduto.php" method="get"></form>
                                <input type="text" class="form-control" placeholder="O que você procura?">
                                <button class="btn text-light" style="background-color: #831D1C;">Buscar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                            <form class="ml-3 d-inline-block">
                                <select class="form-select form-select-sm">
                                    <option>Ordenar pelo nome</option>
                                    <option>Ordenar pelo maior preço</option>
                                    <option>Ordenar pelo menor preço</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown col-md-2 col-sm-12" id="botao">
                        <button class="btn dropdown-toggle text-light" style="background-color: #831D1C;" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                        </button>
                        <ul class="dropdown-menu col-12 col-md-10" aria-labelledby="dropdownMenuButton1">
                            <?php
                                foreach($lstCategorias as $objCategoria){
                                    echo "<li class=\"dropdown-item\">" . $objCategoria->get_titulo() . "</li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-md-12">
                    <hr class="mt-2">
                </div>
                <?php foreach($lstProdutos as $objProduto){ echo'
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
                        <div class="card text-center bg-light">
                            <img src="../Images/Produtos/Bovino/Alcatra.png" class="card-img-top">
                            <div class="card-header">
                                <?php                             
                                foreach($lstProdutos as $objProduto){
                                    echo "<li>' . $objProduto->get_preco() . '</li>
                            </div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">
                                    <?php               
                                $lstProdutos as $objProduto{
                                    echo "<li>' . $objProduto->get_titulo() . '</li>
                                </h5>
                                <p class="card-text line3"> <?php 
                                $lstProdutos as $objProduto{
                                        echo "<li>' . $objProduto->get_descricao() . '</li>
                                </p>
                            </div>
                            <div class="card-footer">
                                <form class="d-block">
                                    <a href="../carrinho/carrinho.php?add=carrinho&codigo='. $objProduto->get_codigo() .'" class="btn btn-danger">Adicionar ao Carrinho</a>
                                </form>
                            </div>
                        </div>
                    </div>';

                }?> 
    <!--Fim Carrossel-->
<!-- footer -->
<?php require_once("../include/footer.php");

