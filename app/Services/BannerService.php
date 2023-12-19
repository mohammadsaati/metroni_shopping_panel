<?php

 namespace App\Services;

 use App\Models\Banner;
 use App\Services\Service;
 use Illuminate\Support\Arr;

 class BannerService extends Service
{

 	public function model()
	{
        $this->model = Banner::class;
	}

     public function createBanner(array $data) : void
     {
         $banner = new Banner();

         $this->createWithSlugImage(data: Arr::only($data , $banner->getFillable()) , image_folder_name: "banners" , has_slug: false);
     }

     public function updateBanner(array $data , Banner $banner)
     {
         $data = array_merge($data , [
             "product_id"   =>  $data["product_id"] ?? null ,
             "category_id"  =>  $data["category_id"] ?? null ,
             "link"         =>  $data["link"] ?? null
         ]);

         $this->updateWithSlugImage(data: Arr::only($data , $banner->getFillable()) , item: $banner , image_folder_name: "banners" , has_slug: false);
     }

     public function deleteBanner(Banner $banner) : void
     {
         delete_image(path: "banners" , image: $banner->image);
         $banner->delete();
     }


 }
