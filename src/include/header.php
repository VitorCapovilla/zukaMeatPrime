<?php require_once("links.html"); ?>

<!--Cabeçalho-->
<nav name="menu cabeçalho principal" class="navbar navbar-expand-lg navbar-dark boder-bottom shadow-sm mb-3" style="background-color: #831D1C;">
    <div class="container">

        <!--Menu Lado Esquerdo-->
        <a href="../index.php" class="navbar-brand"><img src="../Images/Logo/LogoOFC.png" width="90px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarcollapseCMS"
            aria-controls="navbarcollapseCMS" aria-expanded="false" aria-label="Toggle navigation"> <span
                class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarcollapseCMS">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="../index.php" class="text-white nav-link">Produtos</a>
                </li>
                <li class="nav-item">
                    <a href="../view/videos.php" class="text-white nav-link">Vídeos</a>
                </li>
                <li class="nav-item">
                    <a href="../view/quemsomos.php" class="text-white nav-link">Quem Somos</a>
                </li>
            </ul>

            <!--Menu Lado Direto-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Mídias Sociais </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="https://www.facebook.com/meatprimevalinhos/"><img
                                    src="../Images/Icons/Icons_black/facebook_black.png" class="bi" width="25px">
                                Facebook</a></li>
                        <li><a class="dropdown-item" href="https://www.instagram.com/meatprimevalinhos/"><img
                                    src="../Images/Icons/Icons_black/instagram_black.png" class="bi" width="25px">
                                Instagram</a></li>
                        <li><a class="dropdown-item" href="https://api.whatsapp.com/message/ZAEZZNAXTP3QF1"><img
                                    src="../Images/Icons/Icons_black/whatsapp_black.png" class="bi" width="25px">
                                WhatsApp</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../view/login.php" class="nav-link text-light"><img src="../images/Icons/user.png"
                            width="25px">Login</a>
                </li>
                <li class="nav-item">
                    <a href="../view/pagamento.php" class="nav-link text-white"><img src="../images/Icons/churrasco.png" width="30"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>