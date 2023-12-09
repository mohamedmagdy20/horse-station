<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Camp extends Model
{
    use HasFactory , Translatable;
    public $translatedAttributes = ['name','description'];
    protected $translationForeignKey = 'camp_id';
    protected $fillable = [
        'images',
        'videos',
        'location'
    ];
}
