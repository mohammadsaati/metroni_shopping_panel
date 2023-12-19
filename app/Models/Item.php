<?php

namespace App\Models;

use App\Filters\PublicFilter;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory,FilterTrait;

    protected $fillable = [
        "product_id"        ,   "size_id"           ,
        "stock"             ,   "status"
    ];

    protected $filtering_class = PublicFilter::class;

    public function prices()
    {
        return $this->hasMany(Price::class , "item_id");
    }
}
