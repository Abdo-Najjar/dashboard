<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Rennokki\Rating\Traits\Rate;
use Rennokki\Rating\Contracts\Rating;

class ServiceProvider extends Authenticatable implements HasMedia, Rating
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens, HasImage, Rate;


    public const FACILITY_TYPE  = '0';
    public const FREELANCER_TYPE = '1';


    /* Model Hooks */

    protected static function booted()
    {
        static::creating(function ($serviceProvider) {
            $serviceProvider->password = bcrypt($serviceProvider->password);
        });

        static::created(fn () =>  optional(request()->phone)->delete());
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fcm_token',
        'number',
        'type',
        'longitude',
        'latitude',
        'balance',
        'service_distance',
        'city_id',
        'country_id',
        'dommercial_registrationNumber',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    /* Getters */

    public function getImageAttribute()
    {
        return $this->image();
    }


    /* Relationships */

    /**
     * Service Provider belongs to many services.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }


    /**
     * Days belongs to many 
     */
    public function days()
    {
        return $this->belongsToMany(Day::class)->withPivot(['start_at', 'end_at']);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
