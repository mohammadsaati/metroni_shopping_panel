<?php

namespace App\Models;

use App\Filters\CategoryFilter;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use FilterTrait;
    protected $fillable = [
        "name"          ,   "slug"  ,
        "parent_id"     ,   "image" ,
        "priority"      ,   "status"
    ];

    protected $filtering_class = CategoryFilter::class;

    /************************************
     * *********** #STATIC **************
     ************** START ***************/

    public static function GetParents()
    {
        return self::query()->whereNull("parent_id");
    }

    public static function GetSubCategories()
    {
        return self::query()->whereNotNull("parent_id");
    }

    /************************************
     * *********** #STATIC **************
     ************** END ***************/


    /************************************
     * *********** #Scope ***************
     ************** START ***************/


    public function scopeGetParent()
    {
        return self::query()->where("id" , "=" , $this->parent_id)->first();
    }
    /************************************
     * *********** #Scope ***************
     *************** END ****************/


}
