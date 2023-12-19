<?php

namespace App\Models;

use App\Filters\PublicFilter;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory , FilterTrait;

    protected $fillable = [
        "image"         ,       "type"          ,
        "product_id"    ,       "category_id"   ,
        "link"          ,       "status"
    ];

    protected $filtering_class = PublicFilter::class;

    public function scopeShowType() : string
    {
        return match ($this->type) {
            1 => "محصول",
            2 => "دسته بندی",
            3 => "لینک",
            default => "",
        };
    }

}
