<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_id',
        'qantity',
        'total'
    ];

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
