<?php

 namespace App\Services;

 use App\Models\Size;
 use App\Services\Service;
 use Illuminate\Support\Facades\DB;

 class SizeService extends Service
{

 	public function model()
	{
        $this->model = Size::class;
	}
     public function createSize(array $data) : void
     {
         Size::create($data);
     }

 }
