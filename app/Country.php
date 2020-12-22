<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory, HasTranslations;

    public $translatable  = ['name', 'currency'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
