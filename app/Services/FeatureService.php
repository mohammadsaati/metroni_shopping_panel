<?php

 namespace App\Services;

 use App\Models\Feature;
 use App\Services\Service;
 use Illuminate\Support\Facades\DB;

 class FeatureService extends Service
{

 	public function model()
	{
        $this->model = Feature::class;
	}

     public function createFeature(array $data) : void
     {
         DB::transaction(function () use ($data) {
             $data["slug"] = slug_creator(class_name: Feature::class , title: $data["name"]);
             Feature::create($data);
         });
     }

     public function updateFeature(array $data , Feature $feature) : void
     {
         DB::transaction(function () use ($data , $feature) {
             $data = $this->updateSlug(data: $data , item: $feature);

             $this->updates(data: $data  ,item: $feature);
         });
     }


 }
