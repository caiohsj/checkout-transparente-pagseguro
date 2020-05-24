<?php
require(__DIR__."/vendor/autoload.php");

use Source\Pagseguro\Pagseguro;

$session = Pagseguro::getSession();

/**
 * Carrega o formulário
 */
$form = Pagseguro::getPaymentForm("examplePayment.php", $session, 150.44, 10, Pagseguro::SANDBOX);

require("themes/form.php");