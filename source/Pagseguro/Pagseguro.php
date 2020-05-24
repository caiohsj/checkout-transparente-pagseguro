<?php

/**
 * Classe responsável por consumir API do pagseguro
 * 
 * @author Caio Henrique <caiohenrique.programador@gmail.com>
 */

namespace Source\Pagseguro;

use Unirest\Request;
use Unirest\Request\Body;
use League\Plates\Engine;

class Pagseguro
{
    const SANDBOX = 0;
    const PRODUCTION = 1;

    public static function getSession()
    {
        
        $headers = array();
        $query = array();
        Request::verifyPeer(false); 
        $response = Request::post(PAGSEGURO_CONFIG['urlSandbox'].'/sessions?email='.PAGSEGURO_CONFIG['email'].'&token='.PAGSEGURO_CONFIG['tokenSandbox'], $headers, $query);
        
        $xml = simplexml_load_string($response->body);
        $json = json_decode(json_encode($xml));
        
        return $json;
    }
    
    public static function getNotificationTransaction($code)
    {
        
        $headers = array();
        $query = array();
        Request::verifyPeer(false); 
        $response = Request::get(PAGSEGURO_CONFIG['urlSandbox'].'/transactions/notifications/'.$code.'?email='.PAGSEGURO_CONFIG['email'].'&token='.PAGSEGURO_CONFIG['tokenSandbox'], $headers, $query);
        $xml = simplexml_load_string($response->body);
        
        return $xml;
    }

    public static function getPaymentForm(string $actionForm, Object $session, float $amount, int $maxInstallmentNoInterest,int $environment): string
    {
        $view = Engine::create(__DIR__."/../../themes", "php");

        return $view->render("form-checkout", [
            "action" => $actionForm,
            "session" => $session,
            "amount" => "{$amount}",
            "maxInstallmentNoInterest" => $maxInstallmentNoInterest,
            "environment" => $environment
        ]);
    }

}