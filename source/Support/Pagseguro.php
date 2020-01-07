<?php

/* 
 * Classe responsável por consumir API do pagseguro
 */

namespace Source\Support;

use \Unirest\Request;
use Unirest\Request\Body;

class Pagseguro
{
    public static function getSession()
    {
        
        $headers = array();
        $query = array();
        Request::verifyPeer(false); 
        $response = Request::post('https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email='.PAGSEGURO_CONFIG['email'].'&token='.PAGSEGURO_CONFIG['token'], $headers, $query);
        
        $xml = simplexml_load_string($response->body);
        
        return $xml;
    }
    
    public static function setCheckout(array $data)
    {
        $headers = array(
            "Content-Type" => "application/x-www-form-urlencoded;charset=ISO-8859-1"
        );
        
        $body = Body::Form($data);
        
        Request::verifyPeer(false); 
        $response = Request::post('https://ws.sandbox.pagseguro.uol.com.br/v2/transactions?email='.PAGSEGURO_CONFIG['email'].'&token='.PAGSEGURO_CONFIG['token'], $headers, $body);
        
        var_dump($response);exit;
        
        $xml = simplexml_load_string($response->body);
        
        return $xml;
    }
}