<?php

 namespace App\Services;

 use App\Models\City;
 use App\Services\Service;
 use Illuminate\Support\Facades\DB;

 class CityService extends Service
{

 	public function model()
	{
        $this->model = City::class;
	}

     public function createCity(array $data) : void
     {
         DB::transaction(function () use ($data) {
             $data["slug"] = slug_creator(class_name: City::class , title: $data["name"]);
             City::create($data);
         });
     }

     public function updateCity(array $data , City $city) : void
     {
         DB::transaction(function () use ($data , $city) {
             $data = $this->updateSlug(data: $data , item: $city);

             $this->updates(data: $data  ,item: $city);
         });
     }
 }
