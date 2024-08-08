<?php

namespace Faiznurullah\Tokopedia;

use Faiznurullah\Tokopedia\Tokopedia;

class webhook{

    private $tokopedia; 
    public function __construct($bearer){  
        $this->tokopedia = new Tokopedia($bearer);
    }

    public function listRegisteredWebhook($fs_id){
        $suburl = '/v1/fs/'.$fs_id;
        return $this->tokopedia->hitGet($suburl);
    }

    public function registeredWebhook($fs_id, $data = []){
       $suburl = '/v1/fs/'.$fs_id.'/register';
       return $this->tokopedia->hitPost($suburl, $data);
    }


    public function getWebhook($order_id, $fs_id, $type){
        $suburl = '/v1/order/'.$order_id.'/fs/'.$fs_id.'/webhook?type='.$type;
        return $this->tokopedia->hitGet($suburl);
    }

    public function triggerWebhook($fs_id, $data = []){
        $suburl = '/v1/fs/'.$fs_id.'/trigger';
        return $this->tokopedia->hitPost($suburl, $data);
     }

     

}