<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Collection;

trait SharedScopes
{

    /**
     * scope for getting all objects from database sorted desc via updated_at arrtibute.
     *
     * @param Builder $query
     * @return Collection
     */
    public function scopeIndex($query)
    {
        return $query->orderByDesc('updated_at')->get();
    }
}
