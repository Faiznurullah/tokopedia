<?php 

namespace Faiznurullah\Tokopedia;

use Faiznurullah\Tokopedia\Tokopedia;

class interaction{

    private $tokopedia; 
    public function __construct($bearer){  
        $this->tokopedia = new Tokopedia($bearer);
    }

    public function listMessage($fs_id, $shop_id){
        $suburl = '/v1/chat/fs/'.$fs_id.'/messages?shop_id='.$shop_id;
        return  $this->tokopedia->hitGet($suburl);
    }

    public function listReplay($fs_id, $message_id, $shop_id){
        $suburl = '/v1/chat/fs/'.$fs_id.'/messages/'.$message_id.'/replies?shop_id='.$shop_id;
        return  $this->tokopedia->hitGet($suburl);
    }

    public function initiateChat($fs_id, $order_id){
        $suburl = '/v1/chat/fs/'.$fs_id.'/initiate?order_id='.$order_id;
        return  $this->tokopedia->hitGet($suburl);
    }

    public function sendReplay($fs_id, $message_id, $data = []){
        $suburl = '/v1/chat/fs/'.$fs_id.'/messages/'.$message_id.'/reply';
        return  $this->tokopedia->hitPost($suburl, $data); 
    }


}