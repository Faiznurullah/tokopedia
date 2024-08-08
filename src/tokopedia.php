<?php

namespace Faiznurullah\Tokopedia;
use GuzzleHttp\Client;


class Tokopedia{
    
    
    private $client; 
    private $url;
    private $bearer;
    
    public function __construct($bearer)
    { 
        $this->client = new Client();  
        $this->bearer = $bearer;
        // cek url by status
        $this->url = 'https://fs.tokopedia.net';
        
    }
    
   /*
    *  Functions main product
    */
        
    public function hitGet($suburl){
        $response = $this->client->get(
            $this->url . $suburl,
            [   
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->bearer,
                ],
            ]
        );

        return json_decode($response->getBody(), true);

    }

    public function hitPost($suburl, $data = []){
        $response = $this->client->post(
            $this->url . $suburl,
            [   
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->bearer,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data
            ]
        );

        return json_decode($response->getBody(), true); 

    }

    public function hitPatch($suburl, $data){

        $response = $this->client->patch(
            $this->url . $suburl,
            [   
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->bearer,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data
            ]
        );

        return json_decode($response->getBody(), true);

    }
        
        
        
        
        
    }