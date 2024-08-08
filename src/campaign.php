<?php 

namespace Faiznurullah\Tokopedia;
use Faiznurullah\Tokopedia\Tokopedia;

class campaign{
    
    private $tokopedia; 
    public function __construct($bearer){  
        $this->tokopedia = new Tokopedia($bearer);
    }
    
    public function slashPrice($fs_id, $shop_id, $page, $per_page){
        $suburl = '/v2/slash-price/fs/'.$fs_id.'/view?shop_id='.$shop_id.'&page='.$page.'&per_page='.$per_page;
        return $this->tokopedia->hitGet($suburl);
    }
    
    public function productCampaign($fs_id, $product_id, $shop_id){
        $suburl = '/v1/campaign/fs/'.$fs_id.'/view?product_id='.$product_id.'&shop_id='.$shop_id;
        return $this->tokopedia->hitGet($suburl);
    }
    
    


    public function addSlashPrice($fs_id, $shop_id, $data = []){
    $suburl = '/v1/slash-price/fs/'.$fs_id.'/add?shop_id='.$shop_id;
    return $this->tokopedia->hitPost($suburl, $data);
    }

    public function updateSlashPrice($fs_id, $shop_id, $data = []){
        $suburl = '/v1/slash-price/fs/'.$fs_id.'/add?shop_id='.$shop_id;
        return $this->tokopedia->hitPost($suburl, $data);
    }

    public function cancelSlash($fs_id, $shop_id, $data = []){
        $suburl = '/v1/slash-price/fs/'.$fs_id.'/cancel?shop_id='.$shop_id;
        return $this->tokopedia->hitPost($suburl, $data);
    }
 
    
    
    }