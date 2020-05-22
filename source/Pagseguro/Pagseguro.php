<?php

/**
 * Classe responsável por consumir API do pagseguro
 * 
 * @author Caio Henrique <caiohenrique.programador@gmail.com>
 */

namespace Source\Pagseguro;

use \Unirest\Request;
use Unirest\Request\Body;

class Pagseguro
{
    public static function getSession()
    {
        
        $headers = array();
        $query = array();
        Request::verifyPeer(false); 
        $response = Request::post(PAGSEGURO_CONFIG['url'].'/sessions?email='.PAGSEGURO_CONFIG['email'].'&token='.PAGSEGURO_CONFIG['token'], $headers, $query);
        
        $xml = simplexml_load_string($response->body);
        
        return $xml;
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

}