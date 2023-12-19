<?php

 namespace App\Services;

 use App\Models\Slider;
 use App\Services\Service;
 use Illuminate\Support\Facades\DB;

 class SliderService extends Service
{

 	public function model()
	{
        $this->model = Slider::class;
	}

     public function getSliders() : array
     {
        $data = [];

        return $data;
     }

     public function createSlider(array $data) : void
     {
         DB::transaction(function () use ($data){
            $data = $this->saveImageProcess($data);
            Slider::create($data);
         });
     }

     public function updateSlider(array $data , Slider $slider) : void
     {
         DB::transaction(function () use ($data , $slider) {
             if ($data["image"])
             {
                 delete_image(path: "sliders" , image: $slider->image);
                 $data = $this->saveImageProcess($data);
             }

             $this->updates(data: $data , item: $slider);
         });
     }

     public function deleteSlider(Slider $slider) : void
     {
         DB::transaction(function () use ($slider) {
             delete_image(path: "sliders" , image: $slider->image);
             $slider->delete();
         });
     }
     private function saveImageProcess(array $data) : array
     {
         $image_name = file_name($data["image"]);
         image_creator(path: "sliders" , file_name: $image_name);

         return array_merge($data , ["image" => $image_name]);
     }
 }
