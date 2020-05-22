<?php

/* 
 * Classe responsável por consumir API do Pagseguro
 */

namespace Source\Pagseguro;

use Unirest\Request;
use Unirest\Request\Body;

class Pagseguro
{
    private $paymentMode = "default";
    private $paymentMethod = "boleto";
    private $receiverEmail = PAGSEGURO_CONFIG["email"];
    private $currency = 'BRL';
    private $extraAmount = '0.00';
    private $items = [];
    private $notificationURL = null;
    private $reference = null;
    private $senderName = null;
    private $senderCPF = null;
    private $senderAreaCode = null;
    private $senderPhone = null;
    private $senderEmail = null;
    private $senderHash = null;
    private $shippingAddressRequired = 'false';
    private $shippingAddressStreet = null;
    private $shippingAddressNumber = null;
    private $shippingAddressComplement = null;
    private $shippingAddressDistrict = null;
    private $shippingAddressPostalCode = null;
    private $shippingAddressCity = null;
    private $shippingAddressState = null;
    private $shippingAddressCountry = null;
    private $shippingType = null;
    private $shippingCost = null;
    private $creditCardToken = null;
    private $installmentQuantity = null;
    private $installmentValue = null;
    private $noInterestInstallmentQuantity = null;
    private $creditCardHolderName = null;
    private $creditCardHolderCPF = null;
    private $creditCardHolderBirthDate = null;
    private $creditCardHolderAreaCode = null;
    private $creditCardHolderPhone = null;
    private $billingAddressStreet = null;
    private $billingAddressNumber = null;
    private $billingAddressComplement = null;
    private $billingAddressDistrict = null;
    private $billingAddressPostalCode = null;
    private $billingAddressCity = null;
    private $billingAddressState = null;
    private $billingAddressCountry = 'BRA';
    
    private function setCheckout(array $data)
    {
        $headers = array(
            "Content-Type" => "application/x-www-form-urlencoded;charset=ISO-8859-1"
        );
        
        $body = Body::Form($data);
        
        Request::verifyPeer(false); 
        $response = Request::post(PAGSEGURO_CONFIG['urlSandbox'].'/transactions?email='.PAGSEGURO_CONFIG['email'].'&token='.PAGSEGURO_CONFIG['tokenSandbox'], $headers, $body);
        
        $xml = simplexml_load_string($response->body);
        
        $json = json_decode(json_encode($xml));
        
        return $json;
    }

    public function creditCardCheckout()
    {
        $post['paymentMode'] = $this->paymentMode;
        $post['paymentMethod'] = $this->paymentMethod;
        $post['receiverEmail'] = $this->receiverEmail;
        $post['currency'] = $this->currency;
        $post['extraAmount'] = $this->extraAmount;
        foreach ($this->items as  $item) {
            foreach ($item as $key => $value) {
                $post[$key] = $value;
            }
        }
        $post['notificationURL'] = $this->notificationURL;
        $post['reference'] = $this->reference;
        $post['senderName'] = $this->senderName;
        $post['senderCPF'] = $this->senderCPF;
        $post['senderAreaCode'] = $this->senderAreaCode;
        $post['senderPhone'] = $this->senderPhone;
        $post['senderEmail'] = $this->senderEmail;
        $post['senderHash'] = $this->senderHash;
        $post['shippingAddressRequired'] = $this->shippingAddressRequired;
        $post['shippingAddressStreet'] = $this->shippingAddressStreet;
        $post['shippingAddressNumber'] = $this->shippingAddressNumber;
        $post['shippingAddressComplement'] = $this->shippingAddressComplement;
        $post['shippingAddressDistrict'] = $this->shippingAddressDistrict;
        $post['shippingAddressPostalCode'] = $this->shippingAddressPostalCode;
        $post['shippingAddressCity'] = $this->shippingAddressCity;
        $post['shippingAddressState'] = $this->shippingAddressState;
        $post['shippingAddressCountry'] = $this->shippingAddressCountry;
        $post['shippingType'] = $this->shippingType;
        $post['shippingCost'] = $this->shippingCost;
        $post['creditCardToken'] = $this->creditCardToken;
        $post['installmentQuantity'] = $this->installmentQuantity;
        $post['installmentValue'] = $this->installmentValue;
        $post['noInterestInstallmentQuantity'] = $this->noInterestInstallmentQuantity;
        $post['creditCardHolderName'] = $this->creditCardHolderName;
        $post['creditCardHolderCPF'] = $this->creditCardHolderCPF;
        $post['creditCardHolderBirthDate'] = $this->creditCardHolderBirthDate;
        $post['creditCardHolderAreaCode'] = $this->creditCardHolderAreaCode;
        $post['creditCardHolderPhone'] = $this->creditCardHolderPhone;
        $post['billingAddressStreet'] = $this->billingAddressStreet;
        $post['billingAddressNumber'] = $this->billingAddressNumber;
        $post['billingAddressComplement'] = $this->billingAddressComplement;
        $post['billingAddressDistrict'] = $this->billingAddressDistrict;
        $post['billingAddressPostalCode'] = $this->billingAddressPostalCode;
        $post['billingAddressCity'] = $this->billingAddressCity;
        $post['billingAddressState'] = $this->billingAddressState;
        $post['billingAddressCountry'] = $this->billingAddressCountry;
        
        $response = $this->setCheckout($post);

        return $response;
    }

    public function boletoCheckout()
    {
        $post['paymentMode'] = $this->paymentMode;
        $post['paymentMethod'] = $this->paymentMethod;
        $post['receiverEmail'] = $this->receiverEmail;
        $post['currency'] = $this->currency;
        $post['extraAmount'] = $this->extraAmount;
        foreach ($this->items as  $item) {
            foreach ($item as $key => $value) {
                $post[$key] = $value;
            }
        }
        $post['notificationURL'] = $this->notificationURL;
        $post['reference'] = $this->reference;
        $post['senderName'] = $this->senderName;
        $post['senderCPF'] = $this->senderCPF;
        $post['senderAreaCode'] = $this->senderAreaCode;
        $post['senderPhone'] = $this->senderPhone;
        $post['senderEmail'] = $this->senderEmail;
        $post['senderHash'] = $this->senderHash;
        $post['shippingAddressRequired'] = $this->shippingAddressRequired;
        $post['shippingAddressStreet'] = $this->shippingAddressStreet;
        $post['shippingAddressNumber'] = $this->shippingAddressNumber;
        $post['shippingAddressComplement'] = $this->shippingAddressComplement;
        $post['shippingAddressDistrict'] = $this->shippingAddressDistrict;
        $post['shippingAddressPostalCode'] = $this->shippingAddressPostalCode;
        $post['shippingAddressCity'] = $this->shippingAddressCity;
        $post['shippingAddressState'] = $this->shippingAddressState;
        $post['shippingAddressCountry'] = $this->shippingAddressCountry;
        $post['shippingType'] = $this->shippingType;
        $post['shippingCost'] = $this->shippingCost;
        
        $response = $this->setCheckout($post);

        return $response;
    }

    /**
     * Adiciona um item ao checkout
     *
     * @param integer $id
     * @param string $description
     * @param float $amount
     * @param integer $quantity
     * @return Pagseguro
     */
    public function setItem(int $id, string $description, float $amount, int $quantity): Pagseguro
    {
        $itemsQuantity = count($this->items);
        $nextPosition = $itemsQuantity+1;
        $this->items[] = [
            "itemId".$nextPosition => "{$id}",
            "itemDescription".$nextPosition => $description,
            "itemAmount".$nextPosition => number_format($amount,2,'.',''),
            "itemQuantity".$nextPosition => "{$quantity}"
        ];
        return $this;
    }

    public function setNotificationURL(string $url): Pagseguro
    {
        $this->notificationURL = filter_var($url, FILTER_VALIDATE_URL);

        return $this;
    }

    public function setExtraAmount(float $amount): Pagseguro
    {
        $amount = number_format($amount,2,'.','');
        $this->extraAmount = "{$amount}";

        return $this;
    }

    public function setReference(string $ref): Pagseguro
    {
        $this->reference = filter_var($ref, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function setSenderName(string $name): Pagseguro
    {
        $this->senderName = filter_var($name, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function setSenderCPF(string $cpf): Pagseguro
    {
        $this->senderCPF = filter_var($cpf, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function setSenderAreaCode(int $areaCode): Pagseguro
    {
        $areaCode = filter_var($areaCode, FILTER_VALIDATE_INT);
        $this->senderAreaCode = "{$areaCode}";

        return $this;
    }

    public function setSenderPhone(string $phone): Pagseguro
    {
        $this->senderPhone = filter_var($phone, FILTER_SANITIZE_STRING);

        return $this;
    }

    public function setSenderEmail(string $email): Pagseguro
    {
        $this->senderEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        return $this;
    }

    public function setSenderHash(string $hash): Pagseguro
    {
        $this->senderHash = filter_var($hash, FILTER_SANITIZE_STRING);

        return $this;
    }
}