<?php

 namespace App\Filters;

 use App\Filters\Filter;

 class PublicFilter extends Filter
{
     public function name($name)
     {
         return $this->builder->where("name" , "LIKE" , "%".$name."%");
     }

     public function search($name)
     {
         return $this->builder->where("name" , "LIKE" , "%".$name."%");
     }

     public function status($status = "0")
     {
         return $this->builder->where("status" , "LIKE" , "%".$status."%");
     }

 }
