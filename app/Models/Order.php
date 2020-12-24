<?php

namespace App\Models;

use App\Http\Traits\HasMultiImage;
use App\Http\Traits\SharedScopes;
use App\Jobs\UploadMultipleImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Order extends Model implements HasMedia
{
  use HasFactory, SoftDeletes, HasMultiImage, SharedScopes;


  protected $fillable = ['service_provider_id' ,'state', 'category_id', 'time', 'date', 'address_id', 'details' , 'reason_for_close'];
  protected $guarded = [];

  protected static function booted()
  {
    static::creating(function ($order) {
      $order->service_id = Service::findOrFail($order->category_id)->service->id;
    });

    static::created(function ($order) {
      UploadMultipleImage::dispatch($order);
    });
  }

  protected $hidden = ['updated_at', 'created_at', 'deleted_at'];

  public const NEW_ORDER = '0';
  public const ORDER_ACCEPTED_BY_SERVICE_PROVIDER = '1';
  public const ORDER_UNDER_WAY = '2';
  public const ORDER_COMPLETED = '3';
  public const ORDER_CLOSED_BY_CUSTOMER = '4';
  public const ORDER_CLOSED_BY_SERVICE_PROVIDER = '5';


  /** Relations */

  /**
   * Order belongs to a service provider.
   */
  public function serviceProvider()
  {
    return $this->belongsTo(ServiceProvider::class);
  }

  /**
   * Order Belongs to main service.
   */
  public function mainService()
  {
    return $this->belongsTo(Service::class, 'service_id');
  }


  /**
   * Order Belongs to category.
   */
  public function category()
  {
    return $this->belongsTo(Service::class, 'category_id');
  }
}
