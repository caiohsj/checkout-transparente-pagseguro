<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <title><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
    </head>
    <body>

        <div class="container">

            <form method="post" class="mt-3" id="formCheckout">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputName" >Nome</label>
                        <input type="text" class="form-control" id="inputName" name="senderName" onfocus="getSenderHash();">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="senderEmail">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCpf">CPF</label>
                        <input type="number" class="form-control" id="inputCpf" name="senderCPF">
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="shippingAddressStreet">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddressDistrict">Bairro</label>
                        <input type="text" class="form-control" id="inputAddressDistrict" placeholder="Jardim" name="shippingAddressDistrict">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="inputAddressNumber">Número</label>
                        <input type="number" class="form-control" id="inputAddressStreet" placeholder="123" name="shippingAddressNumber">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddressComplement">Complemento</label>
                        <input type="text" class="form-control" id="inputAddressComplement" placeholder="Mercado" name="shippingAddressComplement">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="inputAreaCode">DDD</label>
                        <input type="number" class="form-control" id="inputAreaCode" placeholder="11" name="senderAreaCode">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputAreaCode">Telefone</label>
                        <input type="number" class="form-control" id="inputPhone" placeholder="11111111" name="senderPhone">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control" id="inputCity" name="shippingAddressCity">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Estado</label>
                        <input type="text" class="form-control" id="inputState" name="shippingAddressState">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">CEP</label>
                        <input type="text" class="form-control" id="inputZip" name="shippingAddressPostalCode">
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-check form-check-inline col-md-6">
                        <input onchange="hiddeFieldsCreditCard();" class="form-check-input" type="radio" name="paymentMethod" id="inputRadioBoleto" value="boleto">
                        <label class="form-check-label" for="inputRadioBoleto">Boleto</label>
                        <img id="imgBoleto" src="">
                    </div>
                    <div class="form-check form-check-inline col-md-6" id="brandsCreditCards">
                        <input onchange="showFieldsCreditCard();" class="form-check-input" type="radio" name="paymentMethod" id="inputRadioCreditCard" value="creditCard">
                        <label class="form-check-label" for="inputRadioCreditCard">Cartão de Crédito</label>
                    </div>

                </div>

                <div class="d-none" id="fieldsCreditCard">
                    <h5>Dados do Titular do cartão de crédito *</h5>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="brandClientCreditCard"></div>
                                </div>
                                <input oninput="getBrandCard();" type="number" class="form-control" name="cardNumber" id="inputNumCard" placeholder="Número do Cartão" >
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="inputNameInCard" placeholder="Nome no Cartão" name="creditCardHolderName">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="inputCvvCard" maxlength="3" placeholder="CVV">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-2">

                            <input type="text" class="form-control" id="inputExpirationMonthCard" placeholder="Mês">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="inputExpirationYearCard" placeholder="Ano">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="inputNameHolderCreditCard" placeholder="Nome">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="number" class="form-control" id="inputCpfHolderCreditCard" placeholder="CPF" name="creditCardHolderCPF">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="date" class="form-control" id="inputBirthDateHolderCreditCard" name="creditCardHolderBirthDate">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <input type="number" class="form-control" id="inputAreaCodeHolderCreditCard" placeholder="DDD" name="creditCardHolderAreaCode">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="number" class="form-control" id="inputPhoneHolderCreditCard" placeholder="Telefone" name="creditCardHolderPhone">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="inputCityHolderCreditCard" placeholder="Cidade" name="billingAddressCity">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="inputCpfHolderCreditCard" placeholder="Estado" name="billingAddressState">
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" class="form-control" id="inputCountryHolderCreditCard" placeholder="País" name="billingAddressCountry">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="number" class="form-control" id="inputPostalCodeHolderCreditCard" placeholder="CEP" name="billingAddressPostalCode">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="inputAddressHolderCreditCard" placeholder="Rua, Av" name="billingAddressStreet">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="inputAddressDistrictHolderCreditCard" placeholder="Barirro" name="billingAddressDistrict">
                        </div>
                        <div class="form-group col-md-1">
                            <input type="number" class="form-control" id="inputAddressStreetHolderCreditCard" placeholder="Número" name="billingAddressNumber">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="inputAddressComplementHolderCreditCard" placeholder="Complemento" name="billingAddressComplement">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <select class="form-control" id="selectInstallments" name="installment">

                            </select>
                        </div>
                    </div>
                </div>

                <!-- Inputs hiddens -->
                <input type="hidden" name="senderHash" id="inputSenderHash">
                <input type="hidden" name="creditCardToken" id="inputCreditCardToken">
                <!-- Fim Inputs hiddens -->

                <button onclick="getTokenCreditCard();" type="button" class="btn btn-primary">Pagar</button>
            </form>

            <div id="methods">
            </div>
        </div>


        <script type="text/javascript" src=
        "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <script type="text/javascript">

                            PagSeguroDirectPayment.setSessionId('<?php echo htmlspecialchars( $session->id, ENT_COMPAT, 'UTF-8', FALSE ); ?>');

                            PagSeguroDirectPayment.getPaymentMethods({
                                amount: '<?php echo htmlspecialchars( $product->amount, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
                                success: function (response) {
                                    // Retorna os meios de pagamento disponíveis.
                                    var methods = response.paymentMethods;
                                    //Boleto
                                    var boleto = methods.BOLETO.options.BOLETO;
                                    var boletoImg = boleto.images.MEDIUM.path;
                                    //Cartões de crédito
                                    var cards = methods.CREDIT_CARD.options;
                                    //Cartão Visa
                                    var visa = cards.VISA;
                                    var visaImg = visa.images.MEDIUM.path;
                                    //Cartão Elo
                                    var elo = cards.ELO;
                                    var eloImg = elo.images.MEDIUM.path;
                                    //Cartão MasterCard
                                    var mastercard = cards.MASTERCARD;
                                    var mastercardImg = mastercard.images.MEDIUM.path;

                                    if (boleto.status == 'AVAILABLE') {
                                        $("#imgBoleto").attr('src', function () {
                                            return 'https://stc.pagseguro.uol.com.br' + boletoImg
                                        });
                                    }

                                    if (visa.status == 'AVAILABLE') {
                                        $("#brandsCreditCards").append('<img src="https://stc.pagseguro.uol.com.br' + visaImg + '">');
                                    }

                                    if (elo.status == 'AVAILABLE') {
                                        $("#brandsCreditCards").append('<img src="https://stc.pagseguro.uol.com.br' + eloImg + '">');
                                    }

                                    if (mastercard.status == 'AVAILABLE') {
                                        $("#brandsCreditCards").append('<img src="https://stc.pagseguro.uol.com.br' + mastercardImg + '">');
                                    }

                                },
                                error: function (response) {
                                    // Callback para chamadas que falharam.
                                },
                                complete: function (response) {
                                    // Callback para todas chamadas.
                                }
                            });

                            function getSenderHash() {
                                PagSeguroDirectPayment.onSenderHashReady(function (response) {
                                    if (response.status == 'error') {
                                        console.log(response.message);
                                        return false;
                                    }
                                    console.log(response);
                                    var hash = response.senderHash; //Hash estará disponível nesta variável.
                                    $("#inputSenderHash").val(hash);
                                });
                            }

                            //Gerando token do cartão de crédito
                            function getTokenCreditCard() {
                                var numCreditCard = $("#inputNumCard").val();
                                var brand = $("#brandClientCreditCard").text();
                                var cvv = $("#inputCvvCard").val();
                                var expirationMonth = $("#inputExpirationMonthCard").val();
                                var expirationYear = $("#inputExpirationYearCard").val();
                                
                                PagSeguroDirectPayment.createCardToken({
                                    cardNumber: numCreditCard, // Número do cartão de crédito
                                    brand: brand, // Bandeira do cartão
                                    cvv: cvv, // CVV do cartão
                                    expirationMonth: expirationMonth, // Mês da expiração do cartão
                                    expirationYear: expirationYear, // Ano da expiração do cartão, é necessário os 4 dígitos.
                                    success: function (response) {
                                        // Retorna o cartão tokenizado.
                                        console.log(response);
                                        $("#inputCreditCardToken").val(response.card.token);
                                        $("#formCheckout").submit();
                                    },
                                    error: function (response) {
                                        // Callback para chamadas que falharam.
                                    },
                                    complete: function (response) {
                                        // Callback para todas chamadas.
                                    }
                                });
                            }

                            //Mostra os campos necessários para pagamentos com cartão de crédito
                            function showFieldsCreditCard() {
                                $("#fieldsCreditCard").removeClass('d-none');
                            }

                            //Esconde os campos necessários para pagamentos com cartão de crédito
                            function hiddeFieldsCreditCard() {
                                $("#fieldsCreditCard").addClass('d-none');
                            }

                            //Verifica a bandeira do cartão de crédito
                            function getBrandCard() {
                                var numCard = $("#inputNumCard").val();
                                bin = numCard.substring(0, 6);

                                var brandAux = $("#brandClientCreditCard").text();

                                if (numCard.length > 5 && brandAux == '') {
                                    PagSeguroDirectPayment.getBrand({
                                        cardBin: bin,
                                        success: function (response) {
                                            //bandeira encontrada
                                            console.log(response);
                                            var brand = response.brand;
                                            $("#brandClientCreditCard").html(brand.name);

                                            getInstallmentsPayment(brand.name);

                                        },
                                        error: function (response) {
                                            //tratamento do erro
                                        },
                                        complete: function (response) {
                                            //tratamento comum para todas chamadas
                                        }
                                    });
                                }


                            }

                            //Adiciona as opções de parcelamento
                            function getInstallmentsPayment(brand) {

                                var brand = $("#brandClientCreditCard").text();


                                PagSeguroDirectPayment.getInstallments({
                                    amount: '<?php echo htmlspecialchars( $product->amount, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
                                    maxInstallmentNoInterest: 5,
                                    brand: brand,
                                    success: function (response) {
                                        // Retorna as opções de parcelamento disponíveis

                                        //Se o cartão de crédito for da bandeira elo
                                        if (brand == 'elo') {
                                            var eloInstaments = response.installments.elo;

                                            for (var i = 0; i < eloInstaments.length; i++) {
                                                let installment = eloInstaments[i];

                                                $("#selectInstallments")
                                                        .append(
                                                                '<option value="' + installment.quantity + '/' + installment.installmentAmount + '">' + installment.quantity + 'x de R$ ' + installment.installmentAmount + ' -  total R$ ' + installment.totalAmount + '</option>');
                                            }
                                        }

                                        //Se o cartão de crédito for da bandeira visa
                                        if (brand == 'visa') {
                                            var visaInstaments = response.installments.visa;

                                            for (var i = 0; i < visaInstaments.length; i++) {
                                                let installment = visaInstaments[i];

                                                $("#selectInstallments")
                                                        .append(
                                                                '<option value="' + installment.quantity + '/' + installment.installmentAmount + '">' + installment.quantity + 'x de R$ ' + installment.installmentAmount + ' -  total R$ ' + installment.totalAmount + '</option>');
                                            }
                                        }

                                        //Se o cartão de crédito for da bandeira mastercard
                                        if (brand == 'mastercard') {
                                            var mastercardInstaments = response.installments.mastercard;

                                            for (var i = 0; i < mastercardInstaments.length; i++) {
                                                let installment = mastercardInstaments[i];

                                                $("#selectInstallments")
                                                        .append(
                                                                '<option value="' + installment.quantity + '/' + installment.installmentAmount + '">' + installment.quantity + 'x de R$ ' + installment.installmentAmount + ' -  total R$ ' + installment.totalAmount + '</option>');
                                            }
                                        }

                                    },
                                    error: function (response) {
                                        // callback para chamadas que falharam.
                                    },
                                    complete: function (response) {
                                        // Callback para todas chamadas.

                                    }
                                });

                            }

        </script>

        <script src="<?php echo BASE_URL; ?>/themes/js/pagseguro-checkout-transparente.js"></script>

    </body>
</html>