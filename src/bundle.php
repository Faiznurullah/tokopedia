<?php

namespace Faiznurullah\Tokopedia;
use Faiznurullah\Tokopedia\Tokopedia;

class bundle{
    
    private $tokopedia;
    
    public function __construct($bearer){  
        $this->tokopedia = new Tokopedia($bearer);
    }
    
    public function createBundle($fs_id, $shop_id, $data = []){
        $suburl = '/v1/products/bundle/fs/'.$fs_id.'/create?shop_id='.$shop_id;
        return $this->tokopedia->hitPost($suburl, $data);
    }

    public function cancelBundle($fs_id, $shop_id, $bundle_id){
        $suburl = '/v1/products/bundle/fs/'.$fs_id.'/edit?shop_id='.$shop_id;
        $data = [
            'bundle_id' => $bundle_id
        ];

        return $this->tokopedia->hitPatch($suburl, $data);

    }

    public function getBundleInfo($fs_id, $bundle_ids = []){
        $bundle_ids_str = implode(',', $bundle_ids);
        $suburl = '/v1/products/bundle/fs/'.$fs_id.'/bundle/info?bundle_id='.$bundle_ids_str;
        return $this->tokopedia->hitGet($suburl);
    }

    public function getBundleList($fs_id, $shop_id, $type, $status, $last_group_id){
        $suburl = '/v1/products/bundle/fs/'.$fs_id.'/list?shop_id='.$shop_id.'&type='.$type.'&status='.$status.'&last_group_id='.$last_group_id;
        return $this->tokopedia->hitGet($suburl);
    }

    
    
    
}