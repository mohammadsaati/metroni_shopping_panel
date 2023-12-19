<?php

namespace App\Classes\Slug;

class Slug
{
    private string $class_name;

    private string $field_name;

    private string $title;

    public function __construct(string $class_name , string $field_name , string $title)
    {
        $this->class_name = $class_name;
        $this->field_name = $field_name;
        $this->title = $title;
    }

    public function create() : string
    {
        $trim_title = str_replace(" " , "_" , $this->title);

        $this->title = $trim_title;

        return $this->checkExist();
    }

    private function checkExist() : string
    {
        $slug = $this->class_name::query()->where("slug" , $this->title)->first();

        if ($slug)
            return $this->change_slug();

        return $this->title;
    }

    private function change_slug() : string
    {
        return $this->title."_".time();
    }

}
