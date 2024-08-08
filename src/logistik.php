<?php

namespace Faiznurullah\Tokopedia;

class logistik{

    private $tokopedia; 
    public function __construct($bearer){  
        $this->tokopedia = new Tokopedia($bearer);
    }


    public function getActiveCourier($fs_id){
        $suburl = '/v1/logistic/fs/'.$fs_id.'/active-info';
        return $this->tokopedia->hitGet($suburl);
    }

    public function getShipmentInfo($fs_id){
        $suburl = '/v2/logistic/fs/'.$fs_id.'/info';
        return $this->tokopedia->hitGet($suburl);
    }

    public function updateShipmentInfo($fs_id, $shop_id){
        $suburl = '/v2/logistic/fs/'.$fs_id.'/update';
        $data = [
            'shop_id' => $shop_id
        ];

        return $this->tokopedia->hitPost($suburl, $data);
        
    }


}