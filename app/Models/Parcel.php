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

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tracker()
    {
        return $this->hasMany(Tracker::class, 'tracking_id', 'tracking_id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($parcel) {
            $parcel->tracking_id = strtoupper(Str::random(6));
            $pricing = new ParcelPricing($parcel->weight, $parcel->parcel_price);
            $parcel->merchant_payback_amount = $pricing->getMerchantPaybackAmount();
        });

        self::created(function ($parcel) {
            $parcel->tracker()->create([
                'status_message' => 'পার্সেল প্লেস করা হয়েছে!'
            ]);
        });
    }


}
