<?php

namespace App\Models;

use App\Filters\PublicFilter;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory , FilterTrait;

    protected $fillable = ["value"];

    protected $filtering_class = PublicFilter::class;
}
