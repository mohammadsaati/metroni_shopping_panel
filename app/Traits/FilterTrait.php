<?php

namespace App\Traits;

use App\Filters\Filter;
use App\Filters\PublicFilter;

trait FilterTrait
{

    public function scopeFilter($query ,  $filter = PublicFilter::class)
    {
        if (is_null($this->filtering_class))
            return $filter->apply($query);

        return (new $this->filtering_class(request()))->apply($query);
    }

}
