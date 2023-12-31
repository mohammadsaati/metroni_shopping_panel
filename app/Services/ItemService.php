<?php

 namespace App\Services;

 use App\Models\Item;
 use App\Models\Price;
 use App\Models\Product;
 use App\Models\ShippingPrice;
 use App\Services\Service;

 class ItemService extends Service
{

 	public function model()
	{
        $this->model = Item::class;
	}

     public static function createItem(array $data) : void
     {
         $item = Item::query()->updateOrCreate(self::itemData($data));

         $price = new Price(self::priceData($data));
         $item->prices()->save($price);

        if ($data["shipping_prices"])
        {
            $item->shippingPrices()->saveMany(self::createShippingModel($data["shipping_prices"]));
        }
     }

     public function updateItem(array $data , Item $item , Product $product) : void
     {
         $data["product_id"] = $product->id;
         $this->updates(data: self::itemData($data) , item: $item);

         $item->prices()->latest()->first()->update(self::priceData($data));

         if ($data["shipping_prices"])
         {
             $item->shippingPrices()->saveMany(self::createShippingModel($data["shipping_prices"]));
         }
     }

     private static function createShippingModel(array $shipping_prices) : array
     {
         $shippings = [];

         foreach ($shipping_prices as $shipping)
         {
             if ($shipping["city_id"] != null && $shipping["price"] != null)
             {
                 $shippings[] = new ShippingPrice($shipping);
             }
         }

         return $shippings;
     }

     private static function itemData($data) : array
     {
         return [
             "product_id"           =>  $data["product_id"] ,
             "size_id"              =>  $data["size_id"] ,
             "stock"                =>  $data["stock"] ,
             "shipping_price"       =>  $data["shipping_price"] ,
             "status"               =>  $data["status"]
         ];
     }

     private static function priceData($data) : array
     {
         return [
             "after"            =>  $data["price"] ,
             "before"           =>  $data["before"] ?? null,
             "discount"         =>  $data["discount"] ?? null ,
             "off_deadline"     =>  $data["off_deadline"] ?? null
         ];
     }



 }
