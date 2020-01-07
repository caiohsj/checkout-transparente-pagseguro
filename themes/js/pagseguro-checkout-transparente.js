        PagSeguroDirectPayment.getPaymentMethods({
            amount: 500.00,
            success: function(response) {
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
                
                if(boleto.status == 'AVAILABLE'){
                    $("#imgBoleto").attr('src',function() {
                        return 'https://stc.pagseguro.uol.com.br'+boletoImg
                    });
                }
                
                if(visa.status == 'AVAILABLE'){
                    $("#brandsCreditCards").append('<img src="https://stc.pagseguro.uol.com.br'+visaImg+'">');
                }
                
                if(elo.status == 'AVAILABLE'){
                    $("#brandsCreditCards").append('<img src="https://stc.pagseguro.uol.com.br'+eloImg+'">');
                }
                
                if(mastercard.status == 'AVAILABLE'){
                    $("#brandsCreditCards").append('<img src="https://stc.pagseguro.uol.com.br'+mastercardImg+'">');
                }
                
                console.log(visaImg);
            },
            error: function(response) {
                // Callback para chamadas que falharam.
                console.log(response);
            },
            complete: function(response) {
                // Callback para todas chamadas.
                console.log(response);
            }
        });
        
        


