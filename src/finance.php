<?php 

namespace Faiznurullah\Tokopedia;
use Faiznurullah\Tokopedia\Tokopedia;

class finance{

    private $tokopedia; 
    public function __construct($bearer){  
        $this->tokopedia = new Tokopedia($bearer);
    }

    public function getSaldoHistory($fs_id, $shop_id, $page, $per_page, $from_date, $to_date){
      $suburl = '/v1/fs/'.$fs_id.'/shop/'.$shop_id.'/saldo-history?page='.$page.'&per_page='.$per_page.'&from_date='.$from_date.'&to_date='.$to_date;
      return $this->tokopedia->hitGet($suburl);
    }


}