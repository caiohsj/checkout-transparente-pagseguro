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
        
        
        $data = [
            'title' => 'Home',
            'teste' => 'Hello',
            'session' => $session
        ];
        $this->view->assignData($data);
        $this->view->draw('home');
    }
    
    public function error()
    {
        echo 'PÁGINA NÃO ENCONTRADA!';
    }
}