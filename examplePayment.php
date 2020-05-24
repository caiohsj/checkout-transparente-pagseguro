<?php
require(__DIR__."/vendor/autoload.php");

$payment = new Source\Pagseguro\Payment();
$payment->setSenderName($_POST["senderName"])
        ->setSenderEmail($_POST["senderEmail"])
        ->setSenderCPF($_POST["senderCPF"])
        ->setSenderAreaCode($_POST["senderAreaCode"])
        ->setSenderPhone($_POST["senderPhone"])
        ->setSenderHash($_POST["senderHash"])
        ->setShippingAddressStreet($_POST["shippingAddressStreet"])
        ->setShippingAddressDistrict($_POST["shippingAddressDistrict"])
        ->setShippingAddressNumber($_POST["shippingAddressNumber"])
        ->setShippingAddressComplement($_POST["shippingAddressComplement"])
        ->setShippingAddressCity($_POST["shippingAddressCity"])
        ->setShippingAddressState($_POST["shippingAddressState"])
        ->setShippingAddressPostalCode($_POST["shippingAddressPostalCode"])
        ->setItem(23, "LIVRO", 150.44, 1);

/**
 * Se for cartão de crédito
 */
if ($_POST["paymentMethod"] == "creditCard") {
    $payment->setPaymentMethod(Source\Pagseguro\Payment::CREDIT_CARD)
            ->setInstallmentQuantity($_POST["installmentQuantity"])
            ->setInstallmentValue($_POST["installmentValue"])
            ->setCreditCardToken($_POST["creditCardToken"])
            ->setCreditCardHolderName($_POST["creditCardHolderName"])
            ->setCreditCardHolderCPF($_POST["creditCardHolderCPF"])
            ->setCreditCardHolderBirthDate($_POST["creditCardHolderBirthDate"])
            ->setCreditCardHolderAreaCode($_POST["creditCardHolderAreaCode"])
            ->setCreditCardHolderPhone($_POST["creditCardHolderPhone"])
            ->setBillingAddressStreet($_POST["billingAddressStreet"])
            ->setBillingAddressDistrict($_POST["billingAddressDistrict"])
            ->setBillingAddressNumber($_POST["billingAddressNumber"])
            ->setBillingAddressComplement($_POST["billingAddressComplement"])
            ->setBillingAddressCity($_POST["billingAddressCity"])
            ->setBillingAddressState($_POST["billingAddressState"])
            ->setBillingAddressPostalCode($_POST["billingAddressPostalCode"]);
}


try {
    $transaction = $payment->checkout();
    var_dump($transaction);
} catch(Source\Pagseguro\Exceptions\PaymentException $e) {
    var_dump($e);
    var_dump($payment);
}