<?php

 namespace App\Services;

 use App\Models\Product;
 use App\Models\ShippingPrice;
 use App\Services\Service;
 use Illuminate\Support\Facades\DB;

 class ProductService extends Service
{

 	public function model()
	{
        $this->model = Product::class;
	}

     public function createProduct(array $data)
     {
        DB::transaction(function () use ($data) {
            $product = $this->createWithSlugImage(data: $this->choseProductData($data) , image_folder_name: "products");

            // create items
            $this->createItemForProduct(items: $data["items"] , product_id: $product->id);

            //create features
            $product->features()->sync($data["features"]);


            $product->categories()->sync($data["categories"]);


        });
     }


     public function updateProduct($data , Product $product) : void
     {
        DB::transaction(function () use ($data , $product) {

            $this->updateWithSlugImage(data: $this->choseProductData($data) , item: $product , image_folder_name: "products");

            $product->categories()->sync($data["categories"]);

            $product->cities()->sync($data["cities"]??[]);

        });
     }

     private function createItemForProduct(array $items , $product_id) : void
     {
         foreach ($items as $item)
         {
             $item["product_id"] = $product_id;
             ItemService::createItem(data: $item);
         }

     }





     private function choseProductData($data) : array
     {
        return [
            "name"             =>  $data["name"] ,
            "en_name"          =>  $data["en_name"] ,
            "description"      =>  $data["description"] ,
            "category_id"      =>  $data["category_id"] ,
            "brand_id"         =>  $data["brand_id"]??null    ,
            "is_amazing"       =>  $data["is_amazing"]??null ,
            "is_amazing_date"  =>  $data["is_amazing_date"]??null,
            "status"           =>  $data["status"]
        ];
     }



 }
