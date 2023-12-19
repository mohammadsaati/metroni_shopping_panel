<?php

 namespace App\Services;

 use App\Models\ProductImage;
 use App\Services\Service;
 use Illuminate\Support\Facades\DB;

 class ProductImageService extends Service
{

 	public function model()
	{
        $this->model = ProductImage::class;
	}

     public function createImage(array $data ): void
     {
         DB::transaction(function () use ($data){
             $image_name = file_name($data["image"]);

             ProductImage::query()->create([
                 "product_id"   =>  $data["product_id"] ,
                 "image"        =>  $image_name ,
             ]);

             image_creator(path: "products/gallery" , file_name: $image_name);
         });
     }

     public function deleteImage(ProductImage $image)
     {
         DB::transaction(function () use ($image) {
             delete_image(path: "products/gallery" , image: $image->image);

             $image->delete();
         });
     }

 }
