<?php

namespace App\Models;

use App\Filters\PublicFilter;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory , FilterTrait;
    protected $fillable = [
        "name"          ,       "slug"      ,
        "image"         ,       "status"
    ];

    protected $filtering_class = PublicFilter::class;

    public static function GetActiveBrands()
    {
        return self::query()
            ->where("status" , "=" ,  1);
    }
}
