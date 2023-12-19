<?php

 namespace App\Services;

 use App\Models\Feature;
 use App\Models\FeatureProduct;
 use App\Models\Product;
 use App\Services\Service;

 class FeatureProductService extends Service
{

 	public function model()
	{
        $this->model = FeatureProduct::class;
	}

     public function createFeature(array $data , Product $product) : void
     {
         unset($data["_token"]);

         $product->featureProducts()->save(new FeatureProduct($data));
     }

     public function updatePivot(array $data ,Product $product , Feature $feature)
     {
         $product->features()->updateExistingPivot($feature->id , [ "value" => $data["value"] ]);
     }

     public function deleteFeature(Product $product , Feature $feature) : void
     {
          $product->features()->detach($feature);
     }
 }
