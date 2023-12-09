<?php

namespace App\Models;

use App\Enums\AdvertismentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisment extends Model implements TranslatableContract
{
    use HasFactory , Translatable , SoftDeletes;

    public $translatedAttributes = ['name','description'];
    protected $translationForeignKey = 'advertisment_id';

    protected $fillable = [
        'images',
        'videos',
        'price',
        'location',
        'category_id',
        'plan_id',
        'age',
        'phone',
        'type',
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
}
