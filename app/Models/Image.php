<?php

namespace App\Models;

use App\Filters\CategoryFilter;
use App\Filters\PublicFilter;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class Image extends Model
{
    use HasFactory;
    use FilterTrait;
    protected $fillable = [
        "name"          ,   "slug"  ,
        "image"
    ];


}
