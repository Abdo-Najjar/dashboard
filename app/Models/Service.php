<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use App\Http\Traits\SharedScopes;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model implements HasMedia
{
    use HasFactory, HasImage, HasTranslations, SharedScopes, SoftDeletes;



    /* 
    * Constants 
    *
    * 0 for main service , 1 for category , 2 for required work
    *
    */
    public const MAIN_SERVICE = '0';

    public const Category = '1';

    public const REQUIRED_WORK = '2';


    // Translations attributes.
    public $translatable  = ['name'];


    /* Getters */


    /**
     * Get type attribute in string.
     *
     * @param string $value
     * @return string
     */
    public function getTypeAttribute($value): string
    {
        return [
            static::MAIN_SERVICE => 'Main Service',
            static::Category => 'Category',
            static::REQUIRED_WORK => 'Required Work'
        ][$value];
    }


    /* Relationships */

    /**
     * Get the Categories if the service type is main_service , get required_words if the service type is Category(hasMany).
     */
    public function services()
    {
        return $this->hasMany(Service::class, 'service_id');
    }

    /**
     * Get the parent Service for Category and required_Work ().
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /** 
     * Service has many orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
