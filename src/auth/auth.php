<?php

namespace Faiznurullah\Tokopedia\Auth;
use GuzzleHttp\Client;

class Auth{


    private $CLIENT_ID_TOKOPEDIA; 
    private $CLIENT_SECRET_TOKOPEDIA; 
    private $client;
    private $urlAuth;
    
    public function __construct()
    {
        $this->CLIENT_ID_TOKOPEDIA = env('CLIENT_ID_TOKOPEDIA'); 
        $this->CLIENT_SECRET_TOKOPEDIA = env('CLIENT_SECRET_TOKOPEDIA'); 
        $this->client = new Client();
        $this->urlAuth = 'https://accounts.tokopedia.com/token';
        
    }

    public function authenticate(){

        $credentials = base64_encode($this->CLIENT_ID_TOKOPEDIA . ':' . $this->CLIENT_SECRET_TOKOPEDIA);
        $response = $this->client->post(
            $this->urlAuth,
            [
                'headers' => [
                    'Authorization' => 'Basic ' . $credentials,
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials',
                ],
                ]
            );


            return json_decode($response->getBody(), true);

        }

}