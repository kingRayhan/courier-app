<?php

namespace App\Models;

use App\BusinessLogic\ParcelPricing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Parcel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function area()
    {
        return $this->belongsTo(Area::class);
    }

    protected function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    protected function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        self::saving(function ($parcel) {
            $parcel->tracking_id = strtoupper(Str::random(6));
            $pricing = new ParcelPricing($parcel->weight, $parcel->parcel_price);
            $parcel->merchant_payback_amount = $pricing->getMerchantPaybackAmount();
        });
    }

    protected function trackings()
    {
        return $this->hasMany(Tracker::class, 'tracking_id', 'tracking_id');
    }
}
