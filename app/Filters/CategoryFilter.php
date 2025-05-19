<?php

 namespace App\Filters;

 use App\Filters\Filter;

 class CategoryFilter extends Filter
{
     public function name($name)
     {
         return $this->builder->where("name" , "LIKE" , "%".$name."%");
     }

     public function search($name)
     {
         return $this->builder->where("name" , "LIKE" , "%".$name."%");
     }

     public function isParent($isParent = 'true')
     {
         if ($isParent == 'true') {
             return $this->builder->where("parent_id" , null);
         } else {
             return $this->builder->where("parent_id" , "!=" , null);
         }
     }

     public function status($status = "0")
     {
         return $this->builder->where("status" , "LIKE" , "%".$status."%");
     }
}
