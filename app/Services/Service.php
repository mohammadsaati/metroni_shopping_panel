<?php

namespace App\Services;

use App\Filters\PublicFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class Service
{
    public $model;
    protected $pagination = 20;

    protected $query;

    public function __construct()
    {
        $this->model();

    }

    abstract public function model();



    public function showAll($filter)
    {
        return $this->model::query()->orderBy("id" , "DESC")
            ->filter( $filter )
            ->paginate($this->pagination)
            ->appends($filter->request->query());
    }

    public function updates($data ,$item ) : Model | bool
    {
        $safe_data = $this->protection($data);
        return $item->update($safe_data);
    }

    protected function createWithSlugImage(array $data , $image_folder_name , $slug_field_name = "name" , string $image_field_name = "image" ,  bool $has_slug = true)
    {


        return DB::transaction(function () use ($data , $image_folder_name , $slug_field_name , $has_slug , $image_field_name) {
            if ($has_slug)
            {
                $data["slug"] = slug_creator(class_name: $this->model , title: $data[$slug_field_name]);
            }

            if (request()->has($image_field_name))
            {
                $image_name = file_name(request()->file($image_field_name));

                $data = array_merge($data , [$image_field_name => $image_name]);

                image_creator(path: $image_folder_name , file_name: $image_name , image_input: $image_field_name);
            }

            return $this->model::query()->create($data);
        });

    }

    protected function updateWithSlugImage(array $data , $item , $image_folder_name , string $image_field_name = "image" , bool $has_slug = true) : void
    {
        if($has_slug)
        {
            $data = $this->updateSlug(data: $data , item: $item);
        }
        $image = $this->updateStorageImage(item: $item , image_folder_name: $image_folder_name , image_field_name : $image_field_name);

        $data = $image != null ? array_merge($data , [$image_field_name => $image]) : $data;

        $this->updates(data: $data , item: $item);
    }


    protected function protection($data)
    {
        $protections = ["_token" , "id"];

        foreach ($data as $key => $value)
        {

            if (in_array($key , $protections))
            {
                unset($data[$key]);
            }

        }
        return $data;
    }

    protected function sameValue($old_value , $new_value) : bool
    {
        if (trim($old_value , " ") != $new_value)
            return false;
        return true;
    }

    protected function updateSlug(array $data , $item , $filed_name = "name") : array
    {
        if (!$this->sameValue(old_value: $data[$filed_name] , new_value: $item[$filed_name]))
            $data["slug"] = slug_creator(class_name: $this->model , title: $data[$filed_name]);

        return $data;

    }

    protected function updateStorageImage($item , $image_folder_name ,  string $image_field_name = "image" ) : string | null
    {
        if (request()->has($image_field_name))
        {
            delete_image(path:$image_folder_name , image: $item[$image_field_name]);
            $image_name = file_name(request()->file($image_field_name));

            image_creator(path: $image_folder_name , file_name: $image_name , image_input: $image_field_name);

            return $image_name;
        }

        return null;
    }

}
