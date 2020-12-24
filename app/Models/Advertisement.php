<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use App\Http\Traits\SharedScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class Advertisement extends Model implements HasMedia
{
    use HasFactory , HasImage , HasTranslations , SoftDeletes , SharedScopes;

    public $translatable  = ['name'];

    /** Relations */

    /**
     * Advertismenet belongs to a country (Belongs to).
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
