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
        $product->amount = '100.00';
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
        $product->amount = '100.00';
        $product->description = 'Notebook Acer Core i5';
        $product->quantity = 1;

        if($_POST['paymentMethod'] === 'creditCard')
            $post = Pagseguro::getDataCreditCardCheckout($_POST, $product);

        if($_POST['paymentMethod'] === 'boleto')
            $post = Pagseguro::getDataBoletoCheckout($_POST, $product);
        
        $response = Pagseguro::setCheckout($post);
        
        echo '<a href="{$response->paymentLink}">Boleto</a>';
    }
    
    public function error()
    {
        echo 'PÁGINA NÃO ENCONTRADA!';
    }
}