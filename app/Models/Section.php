<?php

namespace App\Models;

use App\Filters\PublicFilter;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory , FilterTrait;

    protected $fillable = [
        "name"          ,   "slug"      ,
        "bg_color"      ,   "bg_image"  ,
        "status"
    ];

    protected $filtering_class = PublicFilter::class;

    public function products()
    {
        return $this->belongsToMany(Product::class , "product_sections" , "section_id" , "product_id")->withTimestamps();
    }
}
