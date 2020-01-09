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
        $response = Request::post(PAGSEGURO_CONFIG['url'].'/sessions?email='.PAGSEGURO_CONFIG['email'].'&token='.PAGSEGURO_CONFIG['token'], $headers, $query);
        
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
        $response = Request::post(PAGSEGURO_CONFIG['url'].'/transactions?email='.PAGSEGURO_CONFIG['email'].'&token='.PAGSEGURO_CONFIG['token'], $headers, $body);
        
        $xml = simplexml_load_string($response->body);
        
        return $xml;
    }

    public static function getDataCreditCardCheckout(array $post, $product):array
    {
        $installment = explode('/',$post['installment']);

        $post['paymentMode'] = 'default';
        $post['receiverEmail'] = PAGSEGURO_CONFIG['email'];
        $post['currency'] = 'BRL';
        $post['extraAmount'] = '0.00';
        $post['itemId1'] = $product->id;
        $post['itemAmount1'] = $product->amount;
        $post['itemDescription1'] = $product->description;
        $post['itemQuantity1'] = $product->quantity;
        $post['notificationURL'] = 'https://sualoja.com.br/notifica.html';
        $post['reference'] = 'REF12345';
        $post['shippingAddressRequired'] = 'true';
        $post['shippingType'] = 1;
        $post['noInterestInstallmentQuantity'] = 10;
        $post['installmentQuantity'] = $installment[0];
        $post['installmentValue'] = $installment[1];
        $post['creditCardHolderBirthDate'] = date('d/m/Y', strtotime($post['creditCardHolderBirthDate']));
        $post['shippingAddressCountry'] = 'BRA';

        return $post;
    }

    public static function getDataBoletoCheckout(array $data, $product):array
    {
        $post['paymentMode'] = 'default';
        $post['paymentMethod'] = 'boleto';
        $post['receiverEmail'] = PAGSEGURO_CONFIG['email'];
        $post['currency'] = 'BRL';
        $post['extraAmount'] = '0.00';
        $post['itemId1'] = $product->id;
        $post['itemAmount1'] = $product->amount;
        $post['itemDescription1'] = $product->description;
        $post['itemQuantity1'] = $product->quantity;
        $post['notificationURL'] = 'https://sualoja.com.br/notifica.html';
        $post['reference'] = 'REF12345';
        $post['senderName'] = $data['senderName'];
        $post['senderCPF'] = $data['senderCPF'];
        $post['senderAreaCode'] = $data['senderAreaCode'];
        $post['senderPhone'] = $data['senderPhone'];
        $post['senderEmail'] = $data['senderEmail'];
        $post['senderHash'] = $data['senderHash'];
        $post['shippingAddressRequired'] = 'true';
        $post['shippingAddressStreet'] = $data['shippingAddressStreet'];
        $post['shippingAddressNumber'] = $data['shippingAddressNumber'];
        $post['shippingAddressComplement'] = $data['shippingAddressComplement'];
        $post['shippingAddressDistrict'] = $data['shippingAddressDistrict'];
        $post['shippingAddressPostalCode'] = $data['shippingAddressPostalCode'];
        $post['shippingAddressCity'] = $data['shippingAddressCity'];
        $post['shippingAddressState'] = $data['shippingAddressState'];
        $post['shippingAddressCountry'] = 'BRA';
        $post['shippingType'] = 1;

        return $post;
    }
}