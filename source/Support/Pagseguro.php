<?php

/* 
 * Classe responsável por consumir API do pagseguro
 */

namespace Source\Support;

use \Unirest\Request;

class Pagseguro
{
    public static function getSession()
    {
        
        $headers = array();
        $query = array();
        Request::verifyPeer(false); 
        $response = Request::post('https://ws.pagseguro.uol.com.br/v2/sessions?email='.PAGSEGURO_CONFIG['email'].'&token='.PAGSEGURO_CONFIG['token'], $headers, $query);
        
        $xml = simplexml_load_string($response->body);
        
        return $xml;
    }
}