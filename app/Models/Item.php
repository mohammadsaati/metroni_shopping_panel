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
        "stock"             ,   "status"            ,
        "shipping_price"    ,
    ];

    protected $filtering_class = PublicFilter::class;

    public function prices()
    {
        return $this->hasMany(Price::class , "item_id");
    }

    public function shippingPrices()
    {
        return $this->hasMany(ShippingPrice::class , "item_id");
    }

    public function size()
    {
        return $this->belongsTo(Size::class , "size_id");
    }
}
