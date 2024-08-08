<?php

namespace Faiznurullah\Tokopedia;

class shope{

    private $tokopedia;

    public function __construct($bearer){  
        $this->tokopedia = new Tokopedia($bearer);
    }

    public function getShopInfo($fs_id){
        $suburl = '/v1/shop/fs/'.$fs_id.'/shop-info';
        return $this->tokopedia->hitGet($suburl);
    }

    public function updateShopStatus($fs_id, $shop_id, $action, $start_date, $end_date, $close_note, $close_now){
        
        $suburl = '/v2/shop/fs/'.$fs_id.'/shop-status';

        $data = [
            'shop_id' => $shop_id,
            'action' => $action,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'close_note' => $close_note,
            'close_now' => $close_now
        ];

        return $this->tokopedia->hitPost($suburl, $data);
    }

    public function getShowcase($fs_id, $shop_id){

        $suburl = '/v1/showcase/fs/'.$fs_id.'/get?shop_id='.$shop_id;


    }





}