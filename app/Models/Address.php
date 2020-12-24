<?php

namespace App\Models;

use App\Http\Traits\SharedScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes, SharedScopes;

    protected $guarded = [];

    /* Relationships */

    /**
     * Address belongs to an Customer (belongsTo).
     *
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
