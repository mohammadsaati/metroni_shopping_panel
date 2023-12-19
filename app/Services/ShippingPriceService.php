<?php

 namespace App\Services;

 use App\Models\Product;
 use App\Models\ShippingPrice;
 use App\Services\Service;

 class ShippingPriceService extends Service
{

 	public function model()
	{
        $this->model = ShippingPrice::class;
	}

     public function create(array $data) : void
     {
         ShippingPrice::create($data);
     }

     public function updateShipping(array $data , ShippingPrice $shipping_price) : void
     {
         $this->updates(data:  $data , item: $shipping_price);
     }

     public function deleteShipping(ShippingPrice $shipping_price) : void
     {
         $shipping_price->delete();
     }
 }
