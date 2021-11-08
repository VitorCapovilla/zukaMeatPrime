<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
    
    <!-- style css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Importação Google (Recaptcha + API) -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!-- Chamando o CSS para essa página -->
    <link rel="stylesheet" href="style.css">

    <!-- importação do Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- importação do FavIcon-->
    <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="../images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="../images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Importação JS-->
    <script src="script.js" defer></script>
</head>

<!--Cabeçalho-->
<nav name="menu cabeçalho principal" class="navbar navbar-expand-lg navbar-dark boder-bottom shadow-sm mb-3" style="background-color: #831D1C;">
    <div class="container">

        <!--Menu Lado Esquerdo-->
        <a href="../index.html" class="navbar-brand"><img src="../Images/Logo/LogoOFC.png" width="90px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarcollapseCMS"
            aria-controls="navbarcollapseCMS" aria-expanded="false" aria-label="Toggle navigation"> <span
                class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarcollapseCMS">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="../index.html" class="text-white nav-link">Produtos</a>
                </li>
                <li class="nav-item">
                    <a href="../videos/videos.php" class="text-white nav-link">Vídeos</a>
                </li>
                <li class="nav-item">
                    <a href="../Quemsomos/quemsomos.php" class="text-white nav-link">Quem Somos</a>
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
                    <a href="../Login/login.php" class="nav-link text-light"><img src="../images/Icons/user.png"
                            width="25px">Login</a>
                </li>
                <li class="nav-item">
                    <a href="../pagamento/pagamento.php" class="nav-link text-white"><img src="../images/Icons/churrasco.png" width="30"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>