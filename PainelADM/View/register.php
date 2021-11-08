<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/all.css">
    <link rel="stylesheet" href="../plugins/bootstrap-5.1.1-dist/bootstrap-5.1.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Meat Prime</title>
</head>

<body>
    <div class="register-parent">
        <div class="register">
            <div class="register-title">
                <img src="../Imagens/LogoOFC.png" alt="">
                <h2>Meat Prime</h2>
            </div>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Nome completo</label>
                    <input type="text" class="form-control" id="name" placeholder="Digite seu nome completo">
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Idade</label>
                    <input type="text" class="form-control" id="age" placeholder="Digite sua idade">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Gênero</label>
                    <select class="form-control" id="genre">
                        <option>Masculino</option>
                        <option>Feminino</option>
                        <option>Prefiro não dizer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="senha" class="form-control" id="password" placeholder="Senha">
                </div>
                <button type="submit" class="btn ">Cadastrar</button>
            </form>
        </div>
    </div>
    <script src="../plugins/bootstrap-5.1.1-dist/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <script src="../plugins/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/js/all.min.js"></script>
</body>

</html>