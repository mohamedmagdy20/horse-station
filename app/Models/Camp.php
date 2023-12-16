<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Camp extends Model
{
    use HasFactory;
    protected $fillable = [
        'images',
        'videos',
        'location',
        'country_id',
        'is_active',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }

    public function getPriceInCurrency($currencySign , $price)
    {
        $currency = Country::where('sign', $currencySign)->first();
        if (!$currency) {
            throw new \Exception("Currency not supported");
        }
        $convertedPrice = $price / $currency->currency;
        return $convertedPrice;
    }

}
