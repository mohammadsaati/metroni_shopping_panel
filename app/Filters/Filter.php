<?php

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filter
{
    public $request;
    public $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value)
        {
            if ( method_exists($this , $name) && $value != null )
            {
                call_user_func_array( [$this , $name] , array_filter([$value]) );
            }
        }

        return $this->builder;
    }

    protected function filters()
    {
        return $this->request->all();
    }
}
