<?php

namespace App\Models;

use App\Models\City;
use App\Http\Traits\HasImage;
use App\Http\Traits\SharedScopes;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasTranslations, SharedScopes, HasImage;

    protected $guarded = [];

    // Translations attributes.
    public $translatable  = ['name', 'currency'];

    /* Relationships */
    
    /**
     *  Fetch all cities from database related with this country (hasMany).
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     *  Fetch all services from database related with this country (hasMany).
     */
    public function main_service()
    {
        return $this->hasMany(Service::class , 'country_id')->where('type' , Service::MAIN_SERVICE);
    }
    
    /**
     * Fetch all advertisement from database related with this country (hasmany).
     */
    public function advertisement()
    {
        return $this->hasMany(Advertisement::class);
    }
}
