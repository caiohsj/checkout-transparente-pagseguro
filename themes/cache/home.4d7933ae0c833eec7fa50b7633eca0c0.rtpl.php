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

            <form method="post" class="mt-3">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputName" >Nome</label>
                        <input type="text" class="form-control" id="inputName" name="name" onfocus="senderHash();">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">CPF</label>
                        <input type="number" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddressDistrict">Bairro</label>
                        <input type="text" class="form-control" id="inputAddressDistrict" placeholder="Jardim">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="inputAddressNumber">Número</label>
                        <input type="number" class="form-control" id="inputAddressStreet" placeholder="123">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputAddressComplement">Complemento</label>
                        <input type="text" class="form-control" id="inputAddressComplement" placeholder="Mercado">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="inputAreaCode">DDD</label>
                        <input type="number" class="form-control" id="inputAreaCode" placeholder="11">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputAreaCode">Telefone</label>
                        <input type="number" class="form-control" id="inputPhone" placeholder="11111111">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Estado</label>
                        <input type="text" class="form-control" id="inputState">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">CEP</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="form-check form-check-inline col-md-6">
                        <input onchange="hiddeFieldsCreditCard();" class="form-check-input" type="radio" name="methodPayment" id="inputRadioBoleto" value="boleto">
                        <label class="form-check-label" for="inputRadioBoleto">Boleto</label>
                        <img id="imgBoleto" src="">
                    </div>
                    <div class="form-check form-check-inline col-md-6" id="brandsCreditCards">
                        <input onchange="showFieldsCreditCard();" class="form-check-input" type="radio" name="methodPayment" id="inputRadioCreditCard" value="creditCard">
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
                                <input oninput="getBrandCard();" type="number" class="form-control" name="cardNumber" id="inputNumCard" placeholder="Número do Cartão">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" id="inputNameInCard" placeholder="Nome no Cartão">
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
                            <input type="number" class="form-control" id="inputCpfHolderCreditCard" placeholder="CPF">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="date" class="form-control" id="inputBirthDateHolderCreditCard">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <input type="number" class="form-control" id="inputAreaCodeHolderCreditCard" placeholder="DDD">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="number" class="form-control" id="inputPhoneHolderCreditCard" placeholder="Telefone">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="inputCityHolderCreditCard" placeholder="Cidade">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" id="inputCpfHolderCreditCard" placeholder="Estado">
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" class="form-control" id="inputCountryHolderCreditCard" placeholder="País">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="number" class="form-control" id="inputPostalCodeHolderCreditCard" placeholder="CEP">
                        </div>
                    </div>
                    <div class="form-row">
                    
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="inputAddressHolderCreditCard" placeholder="Rua, Av">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="inputAddressDistrictHolderCreditCard" placeholder="Barirro">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="number" class="form-control" id="inputAddressStreetHolderCreditCard" placeholder="Número">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="inputAddressComplementHolderCreditCard" placeholder="Complemento">
                    </div>
                </div>
                </div>
                
                <!-- Inputs hiddens -->
                
                <!-- Fim Inputs hiddens -->

                <button type="submit" class="btn btn-primary">Pagar</button>
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

                            function senderHash() {
                                $("#methods").append('<h1>aaaaa</h1>');
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

                                if (numCard.length > 5) {
                                    PagSeguroDirectPayment.getBrand({
                                        cardBin: bin,
                                        success: function (response) {
                                            //bandeira encontrada
                                            console.log(response);
                                            var brand = response.brand;
                                            $("#brandClientCreditCard").html(brand.name);
                                        },
                                        error: function (response) {
                                            //tratamento do erro
                                            console.log(response);
                                        },
                                        complete: function (response) {
                                            //tratamento comum para todas chamadas
                                            console.log(response);
                                        }
                                    });
                                }


                            }

        </script>

        <script src="<?php echo BASE_URL; ?>/themes/js/pagseguro-checkout-transparente.js"></script>

    </body>
</html>