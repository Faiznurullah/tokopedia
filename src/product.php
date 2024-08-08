<?php

namespace Faiznurullah\Tokopedia; 
use Faiznurullah\Tokopedia\Tokopedia;

class product{

    
    private $tokopedia;

    public function __construct($bearer)
    {  
        $this->tokopedia = new Tokopedia($bearer);
    }
  

     /*
    *  Functions product
    */

    public function getProducts($fs_id, $product_id){
        $suburl = '/inventory/v2/fs/'.$fs_id.'/product/info?product='.$product_id; 
        return $this->tokopedia->hitGet($suburl);
    }


    public function getProductVariant($fs_id, $cat_id){
        $suburl = '/inventory/v2/fs/'.$fs_id.'/category/get_variant?cat_id='.$$cat_id;
        return $this->tokopedia->hitGet($suburl);
    }

    public function createProduct($fs_id, $shop_id, $data){
      $suburl = '/v3/products/fs/'.$fs_id.'/create?shop_id='.$shop_id;
      return $this->tokopedia->hitPost($suburl, $data);
    }

    public function updateProduct($fs_id, $shop_id, $data){
       $suburl = '/v3/products/fs/'.$fs_id.'/edit?shop_id='.$shop_id;
       return $this->tokopedia->hitPatch($suburl, $data);
    }


    public function checkUploadStatus($fs_id, $shop_id, $upload_id){
      $suburl = '/v2/products/fs/'.$fs_id.'/status/'.$upload_id.'?shop_id='.$shop_id;
      return $this->tokopedia->hitGet($suburl);
    }

    public function setActiveProduct($fs_id, $shop_id){
        $suburl = '/v1/products/fs/'.$fs_id.'/active/?shop_id='.$shop_id;
        return $this->tokopedia->hitPost($suburl);
    }


    public function setInactiveProduct($fs_id, $shop_id,){
        $suburl = '/v1/products/fs/'.$fs_id.'/inactive/?shop_id='.$shop_id;
        return $this->tokopedia->hitPost($suburl);
    }
    

    public function updatePriceOnly($fs_id, $shop_id){
        $suburl = '/inventory/v1/fs/'.$fs_id.'/price/update?shop_id='.$shop_id;
        return $this->tokopedia->hitPost($suburl);
    }

    public function updateStockOnly($fs_id, $shop_id){
        $suburl = '/inventory/v1/fs/'.$fs_id.'/stock/update?shop_id='.$shop_id;
        return $this->tokopedia->hitPost($suburl);
    }

    public function deleteProduct($fs_id, $shop_id){
        $suburl = '/v3/products/fs/'.$fs_id.'/delete?shop_id='.$shop_id;
        return $this->tokopedia->hitPost($suburl);
    }

    public function getProductDiscussion($fs_id, $shop_id, $product_id, $page, $per_page){
        $suburl = '/v1/discussion/fs/'.$fs_id.'/list?shop_id='.$shop_id.'&product_id='.$product_id.'&page='.$page.'&per_page='.$per_page;
        return $this->tokopedia->hitGet($suburl);
    }

    public function getProductAnnotation($fas_id, $cat_id){
        $suburl = '/v1/fs/'.$fas_id.'/product/annotation?cat_id='.$$cat_id;
        return $this->tokopedia->hitGet($suburl);
    }

    public function getAllCategories($fs_id, $keyword){
        $suburl = '/inventory/v1/fs/'.$fs_id.'/product/category?keyword=Tas%20Sekolah%20Anak';
        return $this->tokopedia->hitGet($suburl);
    }

}