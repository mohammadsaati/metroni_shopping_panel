<?php

namespace App\Models;

use App\Filters\PublicFilter;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory , FilterTrait;

    protected $fillable = [

    ];
}
