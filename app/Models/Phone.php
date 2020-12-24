<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory,SoftDeletes;

    // Add number and verification_code to prevent mass assgiment from them.
    protected $fillable = ['number' , 'verification_code' , 'verified_at'];
}
