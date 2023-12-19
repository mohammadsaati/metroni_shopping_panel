<?php

namespace App\Models;

use App\Filters\PublicFilter;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory , FilterTrait;

    protected $fillable = [
        "name"          ,   "slug"          ,
        "status"        ,   "province_id"   ,
    ];

    protected $filtering_class = PublicFilter::class;

    public function province()
    {
        return $this->belongsTo(City::class , "province_id");
    }

    public static function GetProvinces()
    {
        return self::query()->whereNull("province_id");
    }

    public static function GetActiveCities()
    {
        return self::query()
            ->where("status" , "=" , 1)
            ->whereNotNull("province_id");
    }
}
