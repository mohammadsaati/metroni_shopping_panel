<?php

 namespace App\Services;

 use App\Models\Section;
 use App\Services\Service;
 use Illuminate\Support\Arr;
 use Illuminate\Support\Facades\DB;

 class SectionService extends Service
{

 	public function model()
	{
        $this->model = Section::class;
	}

     public function createSection(array $data) : void
     {

        DB::transaction(function () use ($data) {
            $section = new Section();

            $created_section = $this->createWithSlugImage(
                data: Arr::only($data , $section->getFillable()) ,
                image_folder_name: "sections" ,
                image_field_name: "bg_image"
            );

            $created_section->products()->sync($data["products"]);
        });

     }

     public function updateSection(array $data , Section $section) : void
     {
         $data = array_merge($data , [
             "products"     => $data["products"] ?? []
         ]);

         DB::transaction(function () use ($data , $section) {
             $this->updateWithSlugImage(
                 data: Arr::only($data , $section->getFillable()) ,
                 item: $section ,
                 image_folder_name: "sections" ,
                 image_field_name: "bg_image"
             );

             $section->products()->sync($data["products"]);
         });
     }

     public function deleteSection(Section $section) : void
     {
         delete_image(path: "sections" , image: $section->bg_image);
         $section->delete();
     }

 }
