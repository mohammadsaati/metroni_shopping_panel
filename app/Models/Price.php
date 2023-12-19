<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        "item_id"           ,   "before"        ,
        "after"             ,   "off_deadline"  ,
        "discount"          ,   "status"
    ];

    protected function offDeadline() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => CalendarUtils::strftime("Y/m/d" , strtotime(Carbon::parse($value))),
            set: fn ($value) => $this->castOffDeadline($value),
        );
    }

    private function castOffDeadline($value)
    {
       if ($value)
       {
           $date = explode("/" , $value);

           $jalali_date = new Jalalian(year: $date[0] , month: $date[1] , day: $date[2]);

           return $jalali_date->toCarbon();
       }
    }
}
