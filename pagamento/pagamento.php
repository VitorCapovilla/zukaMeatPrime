<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- library validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
    <!-- style css -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <script>
        $(document).ready(function(){
            $('.CEP').mask('00000-000');
            $('.numcartao').mask('0000 0000 0000 0000');
            $('.data').mask('00/00');
            $('.cvv').mask('000');
        });
    </script>

<h2>Pagamento</h2>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form id="validate" action="efetuar-pagamento.php" method="POST">
                <div class="row">
                    <div class="col-50">
                        <h3>Endereço de Cobrança</h3>
                        <label for="fname"><i class="fa fa-user"></i> Nome Completo</label>
                        <input type="text" id="fname" name="fullname" placeholder="Digite seu nome" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="Digite seu email" required>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Endereço</label>
                        <input type="text" id="adr" name="address" placeholder="Digite seu endereço" required>
                        <label for="city"><i class="fa fa-institution"></i> Cidade</label>
                        <input type="text" id="city" name="city" placeholder="Digite sua cidade" required>

                        <div class="row">
                            <div class="col-50">
                                <label for="state">Estado</label>
                                <input type="text" id="state" name="state" placeholder="Digite seu estado"required>
                            </div>
                            <div class="col-50">
                                <label for="zip">CEP</label>
                                <input class="CEP" type="text" id="zip" name="zip" placeholder="Digite seu CEP"required>
                            </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Pagamento</h3>
                        <!-- <label for="fname">Bandeiras que aceitamos</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-amex" style="color: green;"></i>
                            <i class="fa fa-cc-discover" style="color: orange;"></i>
                            <i class="fa fa-cc-diners-club" style="color: lightblue;"></i>
                            <i class="fa fa-cc-jcb" style="color: lightseagreen;"></i>
                        </div> -->

                        <label for="cname">Nome no Cartão</label>
                        <input class="card-nome-input"  autocomplete="off" type="text" id="cname" name="cardname" placeholder="Digite o nome do títular do cartão"required>
                        
                        <label for="ccnum">Número do Cartão</label>
                        <input class="numcartao card-numero-input" autocomplete="off" type="text" id="ccnum" name="cardnumber" placeholder="Digite o número do cartão"required>
                        
                        <div class="row">
                            
                            <div class="col-50">
                                <label for="expyear">Data de Vencimento</label>
                                <input class="data card-data-input" autocomplete="off" type="text" id="expyear" name="expyear" placeholder="Ano de vencimento do cartão"required>
                            </div>
                            
                            <div class="col-50">
                                <label for="cvv">Código de Segurança</label>
                                <input class="cvv card-cvv-input" autocomplete="off" type="text" id="cvv" name="cvv" placeholder="Digite o código de segurança do cartão"required>
                            </div>
                            <br>

                        <!-- cartao de credito -->
                            <section class="credit-card col-50">
                                <div class="card col-50">
                                        <!-- NOME -->
                                    <div class="face front absolute">
                                        <div id="owner" class="card-nome-box absolute">Seu Nome</div>
                                    </div>
                                    

                                    <div class="face back absolute">
                                            <!-- Número -->
                                        <div id="graybar" class="absolute"></div>
                                        <div id="card-info" class="absolute">
                                            <div class="card-number-box" style="margin-bottom: 30px;" id="card-number">#### #### #### ####</div>
                                            <div class="flex">
                                                    <!-- VALIDADE -->
                                                <p class="informations">
                                                    <span class="label">VALIDADE</span>
                                                    <div class="card-data-box" id="card-number">00/00</div>
                                                </p>
                                                    <!-- CVV -->
                                                <p class="informations">
                                                    <span class="label">CVV</span>
                                                    <div class="card-cvv-box" id="card-number">000</div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <label>
                <input type="checkbox" checked="checked" name="sameadr"> Endereço de cobrança é o mesmo onde moro.
                </label>
                <input type="submit" value="Comprar" class="btn">
            </form>
        </div>
    </div>
    <div class="col-25">
        <div class="container">
            <h4>Carrinho <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
            
        </div>
    </div>
</div>

<!-- Identificando qual o cartão -->
<script>
    var cc_type = 'unknown';
    var cleave = new Cleave('#numcartao', {
        creditCard: true,
        delimiter: '-',
        onCreditCardTypeChanged: function (type) {
            console.log(type);
            cc_type = type;
        }
    });
    $('#check-cc').click(function(){
        alert(cleave.getFormattedValue() + ' is a ' + cc_type + ' card');
    });
</script>

<!-- script validate js -->
<script>
    $('#validate').validate({
        roles: {
            fullname: {
                required: true,
            },
            email: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            zip: {
                required: true,
            },
            cardname: {
                required: true,
            },
            cardnumber: {
                required: true,
            },
            expmonth: {
                required: true,
            },
            expyear: {
                required: true,
            },
            cvv: {
                required: true,
            },
           
        },
        messages: {
            fullname:"Coloque seu nome Completo*",
            email:"Coloque seu email*",
            city:"Coloque sua cidade*",
            address:"Coloque seu endereço*",
            state:"Coloque seu estado*",
            zip:"Coloque seu CEP*",
            cardname:"Coloque seu nome do cartão*",
            cardnumber:"Coloque o número do cartão*",
            expmonth:"Coloque o mês de vencimento do cartão*",
            expyear:"Coloque o ano de vendimento do cartão*",
            cvv:"Coloque o código de segurança do cartão*",
        },
    });
</script>

<!-- Dgitar as coisas no cartão -->

<script>
        document.querySelector('.card-nome-input').oninput = () => {
            document.querySelector('.card-nome-box').innerHTML = document.querySelector('.card-nome-input').value;
        }

        document.querySelector('.card-numero-input').oninput = () => {
            document.querySelector('.card-number-box').innerHTML = document.querySelector('.card-numero-input').value;
        }

        document.querySelector('.card-data-input').oninput = () => {
            document.querySelector('.card-data-box').innerHTML = document.querySelector('.card-data-input').value;
        }

        document.querySelector('.card-cvv-input').oninput = () => {
            document.querySelector('.card-cvv-box').innerHTML = document.querySelector('.card-cvv-input').value;
        }

</script>

</body>
</html>