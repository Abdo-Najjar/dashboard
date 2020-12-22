<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasFactory,HasTranslations;

    public $translatable  = ['name'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
