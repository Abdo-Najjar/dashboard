<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Rennokki\Rating\Traits\Rate;
use Rennokki\Rating\Contracts\Rating;

class Customer extends Authenticatable implements HasMedia, Rating
{
    use HasFactory, HasImage, Notifiable, SoftDeletes, Rate;


    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($customer) {
            $customer->number = request()->phone->number ?? $customer->number;
            $customer->country_id = City::find(request()->city_id)->country->id ?? $customer->country_id;
            $customer->password = bcrypt($customer->password);
        });

        static::created(fn () =>  optional(request()->phone)->delete());

        static::updating(function (Customer $customer) {
            if (request()->hasFile('image')) {
                // remove the previous image
                $customer->clearMediaCollection();

                // add the new image 
                $customer->addMediaFromRequest('image')->toMediaCollection();
            }

            !request()->has('city_id') ?: $customer->country_id = City::findOrfail(request()->get('city_id'))->country->id;
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'fcm_token', 'number', 'city_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'updated_at',
        'created_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /*  Relationships*/

    /**
     * Customer has Many addresses (hasMany).
     *
     */
    public function addresss()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Customer belongs to a country (Belongs to).
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Customer belongs to a city (Belongs to).
     *
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Customer Has many reports.
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    /**
     * Customer has many addresses.
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }


    /**
     * Customer Has many orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
