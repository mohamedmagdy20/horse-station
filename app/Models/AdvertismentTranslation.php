<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertismentTranslation extends Model
{
    use HasFactory;
    protected $table = 'advertisment_translations';
    protected $fillable = [
        'name',
        'description'
    ];
}
