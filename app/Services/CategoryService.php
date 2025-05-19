<?php

 namespace App\Services;

 use App\Models\Category;
 use App\Services\Service;
 use Illuminate\Database\Eloquent\Collection;
 use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Str;

 class CategoryService extends Service
{

 	public function model()
	{
        $this->model = Category::class;
	}

     public function createCategory($data) : void
     {
         $slug = slug_creator(class_name: $this->model , title: $data["name"]);
         $data["slug"]  =   $slug;

         $image_name = file_name(request()->file("image"));

         $data = array_merge($data->toArray() , ["image" => $image_name]);

         $category = Category::create($data);

         if ($category)
             image_creator(path: "categories" , file_name: $image_name);

     }

     public function updateCategory($data , Category $category) : void
     {
        if (!$this->sameValue(old_value: $data["name"] , new_value: $category->name))
            $data["slug"] = slug_creator(class_name: $this->model , title: $data["name"]);

         $image_name = "";
        if (request()->has("image"))
        {
            delete_image(path:"categories" , image: $category->image);
            $image_name = file_name(request()->file("image"));

            $data = array_merge($data , ["image" => $image_name]);
        }
        $updated_category = $this->updates(data: $data , item: $category);

        if(request()->has("image") && $updated_category)
            image_creator(path: "categories" , file_name: $image_name);

     }

     public function ajaxUpdate($data , Category $category)
     {
         $this->updates($data , $category);
         return response_as_json(data: [
             "message" => "success"
         ]);
     }

 }
