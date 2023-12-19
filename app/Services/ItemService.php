<?php

 namespace App\Services;

 use App\Models\Item;
 use App\Models\Price;
 use App\Models\Product;
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
     }

     public function updateItem(array $data , Item $item , Product $product) : void
     {
         $data["product_id"] = $product->id;
         $this->updates(data: self::itemData($data) , item: $item);

         $item->prices()->latest()->first()->update(self::priceData($data));
     }

     private static function itemData($data) : array
     {
         return [
             "product_id"           =>  $data["product_id"] ,
             "size_id"              =>  $data["size_id"] ,
             "stock"                =>  $data["stock"] ,
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
