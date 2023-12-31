<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        "city_id"           ,   "item_id"    ,
        "price"
    ];

    public function city()
    {
        return $this->belongsTo(City::class , "city_id");
    }

    public function item()
    {
        return $this->belongsTo(Item::class , "item_id");
    }
}
