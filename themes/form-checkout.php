    <div class="container">

        <form method="post" class="mt-3" id="formCheckout" action="<?= $action; ?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputName" >Nome <span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" id="inputName" name="senderName" placeholder="Nome Sobrenome" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="inputEmail4" name="senderEmail" placeholder="exemplo@email.com" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCpf">CPF <span class="text-danger">*</span></label>
                    <input type="text" maxlength="11" class="form-control" id="inputCpf" name="senderCPF" onfocus="getSenderHash();" required>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="inputAddress">Endereço <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos jardins" name="shippingAddressStreet" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddressDistrict">Bairro <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputAddressDistrict" placeholder="Jardim" name="shippingAddressDistrict" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputAddressNumber">Número <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="inputAddressNumber" placeholder="123" name="shippingAddressNumber" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddressComplement">Complemento</label>
                    <input type="text" class="form-control" id="inputAddressComplement" placeholder="Mercado" name="shippingAddressComplement">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="inputAreaCode">DDD <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="inputAreaCode" placeholder="11" name="senderAreaCode" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputAreaCode">Telefone <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="inputPhone" placeholder="11111111" name="senderPhone" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCity">Cidade <span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-capitalize" id="inputCity" name="shippingAddressCity" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputState">Estado (Sigla) <span class="text-danger">*</span></label>
                    <input type="text" maxlength="2" class="form-control text-uppercase" id="inputState" name="shippingAddressState" placeholder="SP" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputZip">CEP <span class="text-danger">*</span></label>
                    <input type="text" maxlength="8"  class="form-control" id="inputZip" name="shippingAddressPostalCode" required>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="form-check form-check-inline">
                    <input onchange="hiddeFieldsCreditCard();" class="form-check-input" type="radio" name="paymentMethod" id="inputRadioBoleto" value="boleto">
                    <label class="form-check-label mr-1" for="inputRadioBoleto">Boleto</label>
                    <img id="imgBoleto" src="">
                </div>

                <div class="form-check form-check-inline" id="brandsCreditCards">
                    <input onchange="showFieldsCreditCard();" class="form-check-input" type="radio" name="paymentMethod" id="inputRadioCreditCard" value="creditCard">
                    <label class="form-check-label" for="inputRadioCreditCard">Cartão de Crédito</label>
                </div>
            </div>

            <div class="d-none" id="fieldsCreditCard">
                <h5 class="text-warning">Dados do Titular do Cartão de Crédito <span class="text-danger">*</span></h5>
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
                        <input type="text" maxlength="11" class="form-control" id="inputCpfHolderCreditCard" placeholder="CPF" name="creditCardHolderCPF">
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
                        <input type="text" maxlength="2" class="form-control" id="inputCpfHolderCreditCard" placeholder="Estado" name="billingAddressState">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="number" maxlength="8" class="form-control" id="inputPostalCodeHolderCreditCard" placeholder="CEP" name="billingAddressPostalCode">
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="inputAddressHolderCreditCard" placeholder="Rua, Av" name="billingAddressStreet">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="inputAddressDistrictHolderCreditCard" placeholder="Bairro" name="billingAddressDistrict">
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
                        <select class="form-control" id="selectInstallments" onchange="setInstallmentQuantity(this);setInstallmentValue(this);">
                            
                        </select>
                    </div>
                </div>
            </div>

            <!-- Inputs hiddens -->
            <input type="hidden" name="senderHash" id="inputSenderHash">
            <input type="hidden" name="creditCardToken" id="inputCreditCardToken">
            <input type="hidden" name="installmentQuantity" id="inputInstallmentQuantity">
            <input type="hidden" name="installmentValue" id="inputInstallmentValue">
            <!-- Fim Inputs hiddens -->

            <button type="submit" class="btn btn-primary d-none" id="buttonBoleto">Pagar com boleto</button>
            <button onclick="getTokenCreditCard();" type="button" class="btn btn-primary d-none" id="buttonCreditCard">Pagar com cartão</button>
        </form>

</div>

<?php if ($environment === 1): ?>
    <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<?php else: ?>
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        PagSeguroDirectPayment.setSessionId('<?= $session->id; ?>');

        PagSeguroDirectPayment.getPaymentMethods({
            amount: '<?= $amount; ?>',
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
                    $("#brandsCreditCards").append('<img class="mr-1" src="https://stc.pagseguro.uol.com.br' + visaImg + '">');
                }

                if (elo.status == 'AVAILABLE') {
                    $("#brandsCreditCards").append('<img class="mr-1" src="https://stc.pagseguro.uol.com.br' + eloImg + '">');
                }

                if (mastercard.status == 'AVAILABLE') {
                    $("#brandsCreditCards").append('<img class="mr-1" src="https://stc.pagseguro.uol.com.br' + mastercardImg + '">');
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
                if (response.status == 'error') {;
                    return false;
                }

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
                    $("#inputCreditCardToken").val(response.card.token);
                    $("#formCheckout").submit();
                },
                error: function (response) {
                    // Callback para chamadas que falharam.
                    setCreditCardErrors(response.errors);
                },
                complete: function (response) {
                    // Callback para todas chamadas.
                }
            });
        }

        //Mostra os campos necessários para pagamentos com cartão de crédito
        function showFieldsCreditCard() {
            $("#fieldsCreditCard").removeClass('d-none');
            $("#buttonCreditCard").removeClass('d-none');
            $("#buttonBoleto").addClass('d-none');
        }

        //Esconde os campos necessários para pagamentos com cartão de crédito
        function hiddeFieldsCreditCard() {
            $("#fieldsCreditCard").addClass('d-none');
            $("#buttonCreditCard").addClass('d-none');
            showButtonBoleto();
        }

        function showButtonBoleto() {
            $("#buttonBoleto").removeClass('d-none');
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
                amount: '<?= $amount; ?>',
                maxInstallmentNoInterest: <?= $maxInstallmentNoInterest; ?>,
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

        function setInstallmentQuantity(installment) {
            let installmentQuantity = installment.value.split("/")[0];
            console.log(installmentQuantity);
            $("#inputInstallmentQuantity").val(installmentQuantity);
        }

        function setInstallmentValue(installment) {
            let installmentValue = installment.value.split("/")[1];
            console.log(installmentValue);
            $("#inputInstallmentValue").val(installmentValue);
        }

        function setCreditCardErrors(errors) {
            var numCreditCard = $("#inputNumCard");
            var brand = $("#brandClientCreditCard");
            var cvv = $("#inputCvvCard");
            var expirationMonth = $("#inputExpirationMonthCard");
            var expirationYear = $("#inputExpirationYearCard");
            console.log(errors);

            if (errors[10000] || errors[10001]) {
                numCreditCard.addClass("is-invalid");
            } else {
                numCreditCard.removeClass("is-invalid");
            }

            if (errors[10002]) {
                expirationMonth.addClass("is-invalid");
                expirationYear.addClass("is-invalid");
            } else {
                expirationMonth.removeClass("is-invalid");
                expirationYear.removeClass("is-invalid");
            }

            if (errors[10004]) {
                cvv.addClass("is-invalid");
            } else {
                cvv.removeClass("is-invalid");
            }
        }

    </script>