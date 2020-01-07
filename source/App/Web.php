<?php

/* 
 * Controller Web
 */
namespace Source\App;

use CoffeeCode\Router\Router;
use Source\Support\View;
use Source\Support\Pagseguro;

class Web
{
    private $router;
    private $view;
    
    public function __construct(Router $router)
    {
        $this->router = $router;
        
        $this->view = new View();
    }
    
    public function home()
    {
        $session = Pagseguro::getSession();
        
        $product = new \stdClass();
        $product->id = 2;
        $product->amount = 1999.99;
        $product->description = 'Notebook Acer Core i5';
        
        $data = array(
            'title' => 'Home',
            'teste' => 'Hello',
            'session' => $session,
            'product' => $product
        );
        $this->view->assignData($data);
        $this->view->draw('home');
    }
    
    public function checkout()
    {
        $product = new \stdClass();
        $product->id = 2;
        $product->amount = 1999.99;
        $product->description = 'Notebook Acer Core i5';
        $product->quantity = 1;
        
        $installment = explode('/',$_POST['installment']);
        
        $_POST['paymentMode'] = 'default';
        $_POST['receiverEmail'] = 'suporte@loja.com.br';
        $_POST['currency'] = 'BRL';
        $_POST['extraAmount'] = 0.00;
        $_POST['itemId1'] = $product->id;
        $_POST['itemAmount1'] = $product->amount;
        $_POST['itemDescription1'] = $product->description;
        $_POST['itemQuantity1'] = $product->quantity;
        $_POST['notificationURL'] = 'https://sualoja.com.br/notifica.html';
        $_POST['reference'] = 'REF12345';
        $_POST['shippingAddressRequired'] = true;
        $_POST['shippingType'] = 1;
        $_POST['noInterestInstallmentQuantity'] = 5;
        $_POST['installmentQuantity'] = $installment[0]; 
        $_POST['installmentValue'] = $installment[1]; 
        
        
            
        var_dump($_POST);
        
        $response = Pagseguro::setCheckout($_POST);
        
        var_dump($response);
    }
    
    public function error()
    {
        echo 'PÁGINA NÃO ENCONTRADA!';
    }
}