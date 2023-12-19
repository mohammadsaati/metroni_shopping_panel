<?php

 namespace App\Services;

 use App\Models\Image;
 use App\Services\Service;
 use Illuminate\Support\Facades\DB;

 class ImageService extends Service
{

 	public function model()
	{
        $this->model = Image::class;
	}

     public function createImage(array $data) : void
     {
         if ($data["name"])
         {
             $data["slug"] = slug_creator(class_name: $this->model , title: $data["name"]);
         }else{
             $data["slug"] = time();
         }

        DB::transaction(function () use ($data){
            $data = $this->saveImageProcess($data);
            Image::create($data);
        });
     }

     public function updateImage(array $data , Image $image) : void
     {
         if ($data["name"] && !$this->sameValue(old_value: $image->name , new_value: $data["name"]))
         {
             $data["slug"] = slug_creator(class_name: $this->model , title: $data["name"]);
         }else{
             $data["slug"] = time();
         }

         DB::transaction(function ()use ($data , $image) {
             delete_image(path: "images" , image: $image->image);

             $data = $this->saveImageProcess($data);

             $this->updates(data: $data , item: $image);

         });
     }

     public function deleteImage(Image $image) : void
     {
         DB::transaction(function () use ($image){
             delete_image(path: "images" , image: $image->image);
             $image->delete();
         });
     }

     private function saveImageProcess(array $data) : array
     {
         $image_name = file_name($data["image"]);
         image_creator(path: "images" , file_name: $image_name);

         return array_merge($data , ["image" => $image_name]);
     }
 }
