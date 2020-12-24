<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use App\Http\Traits\SharedScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Question extends Model implements HasMedia
{
    use HasFactory, SoftDeletes , HasImage , SharedScopes;
}
