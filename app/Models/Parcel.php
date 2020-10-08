<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_address',
        'invoice_id',
        'parcel_price',
        'weight',
        'shop_id'
    ];

    public static function boot()
    {
        parent::boot();
        self::saving(function ($parcel) {
            $parcel->tracking_id = Str::random(6);
        });
    }
}
