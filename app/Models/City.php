<?php

namespace App\Models;

use App\Http\Traits\SharedScopes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, SoftDeletes, HasTranslations, SharedScopes;

    protected $guarded = [];

    // Translations attributes.
    public $translatable  = ['name'];

    /* Relationships */

    /**
     * Get the country that this city belongs to (belongsTo).
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
