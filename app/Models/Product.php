<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Product extends Model implements TranslatableContract
{
    use HasFactory , Translatable;
    public $translatedAttributes = ['name','description'];
    protected $translationForeignKey = 'product_id';

    protected $fillable = [
        'images',
        'videos',
        'deliver_time',
        'price',
        'colors',
        'category_id',
        'size'
    ];

    protected $casts = [
        'images'=>'array',
        'videos'=>'array',
        'colors'=>'array',
        
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class,'order_items');
    }
}
