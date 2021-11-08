<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="plugins/bootstrap-5.1.1-dist/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Meat Prime</title>
</head>

<body>
    <div class="login">
        <div class="login-form">
            <div class="login-form-wrapper">
                <h2>Login</h2>
                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Digite seu email">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="senha" class="form-control" id="senha" placeholder="Digite sua senha">
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
        </div>
        <div class="banner-login">
            <img src="Imagens/LogoOFC.png" alt="">
            <h2>Meat Prime</h2>
        </div>
    </div>
    <script src="plugins/bootstrap-5.1.1-dist/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <script src="plugins/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/js/all.min.js"></script>
    <script>
        let button = document.querySelector('form button.btn')
        button.addEventListener("click", () => {
          location.href = "View/dashboard.php"
        })
    </script>
</body>

</html>