<?php

namespace App\Models;

use App\Filters\ProductFilter;
use App\Traits\FilterTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Product extends Model
{
    use HasFactory , FilterTrait;

    protected $fillable = [
      "name"                ,       "slug"              ,
      "image"               ,       "category_id"       ,
      "brand_id"            ,       "description"       ,
      "status"              ,       "en_name"           ,
      "is_amazing"          ,       "is_amazing_date"

    ];

    protected function isAmazingDate() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == null ? null : CalendarUtils::strftime("Y/m/d" , strtotime(Carbon::parse($value))),
            set: fn($value) => $this->castAmazingDate($value)
        );
    }


    protected $filtering_class = ProductFilter::class;

    public function items()
    {
        return $this->hasMany(Item::class , "product_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class , "category_id");
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class , "product_categories" , "product_id" , "category_id");
    }

    public function cities()
    {
        return $this->belongsToMany(City::class , "product_cities" , "product_id" , "city_id");
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class , "brand_id");
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class , "feature_products" , "product_id" , "feature_id")->withPivot("value");
    }
    public function featureProducts()
    {
        return $this->hasMany(FeatureProduct::class , "product_id");
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class , "product_id");
    }

    /*****************************
     * ****** Scope func ********
     ********* START ************/

    public function scopeShowProductStock()
    {
        return $this->items()->sum("stock");
    }

    /*****************************
     * ****** Scope func ********
     ********* END ************/

    private function castAmazingDate($value)
    {
        if ($value)
        {
            $date = explode("/" , $value);

            $jalali_date = new Jalalian(year: $date[0] , month: $date[1] , day: $date[2]);

            return $jalali_date->toCarbon();
        }
    }

}
