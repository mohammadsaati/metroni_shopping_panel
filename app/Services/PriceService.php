<?php

 namespace App\Services;

 use App\Models\Price;
 use App\Services\Service;

 class PriceService extends Service
{

 	public function model()
	{
        $this->model = Price::class;
	}

     public static function createPrice(array $data) : void
     {
         Price::query()->updateOrCreate($data);
     }

 }
