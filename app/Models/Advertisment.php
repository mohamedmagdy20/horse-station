<?php

namespace App\Models;

use App\Enums\AdvertismentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisment extends Model 
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'images',
        'videos',
        'price',
        'location',
        'category_id',
        'is_active',
        'user_id',
        'plan_id',
        'age',
        'phone',
        'type',
        'country_id',
        'ads_type'
    ];

    protected $casts = [
        'images'=>'array',
        'videos'=>'array',
        'ads_type'=>AdvertismentStatus::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class , 'plan_id');
    }

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

     public function scopeFilter($query, $params)
     {
         
         if(isset($params['category_id']))
         {
             $query->where('category_id',$params['category_id']);
         }
 
         if(isset($params['type']))
         {
             $query->where('type',$params['type']);
         }
 
         if(isset($params['ads_type']))
         {
             $query->where('type',$params['ads_type']);
         }
     }
 
}
