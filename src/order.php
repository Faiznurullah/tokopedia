<?php

namespace Faiznurullah\Tokopedia;
use GuzzleHttp\Client;

class order {

  
    private $url;
    private $client;
    private $tokopedia;

    public function __construct($bearer){ 
        $this->url = 'https://fs.tokopedia.net';
        $this->client = new Client();
        $this->tokopedia = new Tokopedia($bearer);
    }

 
  
    public function getAllOrder($fs_id, $shop_id, $from_date, $to_date, $page, $per_page){

        $suburl = '/v2/order/list?fs_id='.$fs_id.'&shop_id='.$shop_id.'&from_date='.$from_date.'&to_date='.$to_date.'&page='.$page.'&per_page='.$per_page;
        return $this->tokopedia->hitGet($suburl);

    }

    public function getSingleOrder($fs_id, $invoice_id)
    { 
        $suburl = '/v2/fs/'.$fs_id.'/order?invoice_num='.$invoice_id; 
        return $this->tokopedia->hitGet($suburl); 
    }

    public function getShippingLabel($order_id, $fs_id){

        $suburl = '/v1/order/'.$order_id.'/fs/'.$fs_id.'/shipping-label'; 
        return $this->tokopedia->hitGet($suburl);

    }

    public function acceptOrder($order_id, $fs_id, $warehouse_id){
        $suburl = '/v1/order/'.$$order_id.'/fs/'.$fs_id.'/ack?warehouse_id='.$warehouse_id; 
        return $this->tokopedia->hitPost($suburl);
    }

    public function rejectOrder($order_id, $fs_id, $reason_code, $reason, $close_date, $note, $empty_products){
        $suburl = '/v1/order/'.$order_id.'/fs/'.$fs_id.'/nack';
        $data = [
            'reason_code' => $reason_code,
            'reason' => $reason,
            'shop_close_end_date' => $close_date,
            'shop_close_note' => $note,
            'empty_products' => $empty_products
        ]; 
        return $this->tokopedia->hitPost($suburl, $data);
    }

    public function confirmShipping($order_id, $fs_id, $order_status, $shipping_ref_num){
        $suburl = '/v1/order/'.$order_id.'/fs/'.$fs_id.'/status';
        $data = [
            'order_status' => $order_status,
            'shipping_ref_num' => $shipping_ref_num
        ];
        return $this->tokopedia->hitPost($suburl, $data);
    }

    public function requestPickup($fs_id, $order_id, $shop_id){
        $suburl = '/inventory/v1/fs/'.$fs_id.'/pick-up';
        $data = [
            'order_id' => $order_id,
            'shop_id' => $shop_id
        ];
        return $this->tokopedia->hitPost($suburl, $data);
    }

    // COD Method not available yet

    public function getResolutionTicket($fs_id, $shop_id, $start_date, $end_date){
        $suburl = '/resolution/v1/fs/'.$$fs_id.'/ticket?shop_id='.$shop_id;

        $data = [
            'start_date' => $start_date,
            'end_date' => $end_date
        ];

        return $this->tokopedia->hitGet($suburl, $data);

    }

    public function requestPOF($order_id, $fs_id, $pof_detail){
        $suburl = '/v1/order/'.$order_id.'/fs/'.$fs_id.'/pof/request';
        $data = [
            'pof_detail' => $pof_detail
        ];

        return $this->tokopedia->hitPost($suburl, $data);

    }

    public function rejectBuyerRequestCancelation($order_id, $fs_id, $shop_id){
        $suburl = '/v1/order/'.$order_id.'/fs/'.$fs_id.'/reject-cancel?shop_id='.$shop_id; 
        return $this->tokopedia->hitPost($suburl);
    }


}