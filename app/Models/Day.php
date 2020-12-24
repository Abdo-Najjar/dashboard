<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Day extends Model
{
    use HasTranslations;

    public $translatable  = ['name'];

    protected $fillable = ['name'];


    /* Relationships */

    /**
     * List all Server providers related with this day.
     */
    public function serviceProviders()
    {
        return $this->belongsToMany(ServiceProvider::class)->withPivot(['start_at' , 'end_at']);
    }

}

