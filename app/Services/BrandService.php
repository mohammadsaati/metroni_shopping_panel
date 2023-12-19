<?php

 namespace App\Services;

 use App\Models\Brand;
 use App\Services\Service;
 use Illuminate\Support\Facades\DB;

 class BrandService extends Service
{

 	public function model()
	{
        $this->model = Brand::class;
	}

     public function createBrand(array $data) : void
     {
        $this->createWithSlugImage(data: $data , image_folder_name: "brands");
     }

     public function updateBrand(array $data , Brand $brand) : void
     {
         $this->updateWithSlugImage(data: $data , item: $brand , image_folder_name: "brands");
     }

 }
