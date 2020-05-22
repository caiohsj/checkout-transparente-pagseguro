<?php

/* 
 * Controller Web
 */
namespace Source\App;

use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Source\Support\Pagseguro;

class Web
{
    private $router;
    private $view;
    
    public function __construct(Router $router)
    {
        $this->router = $router;
        
        $this->view = Engine::create(__DIR__."/../../themes", "php");
    }
    
    public function home()
    {
        
    }
    
    public function error()
    {
        echo 'PÁGINA NÃO ENCONTRADA!';
    }
}