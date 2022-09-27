<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'slogan',
        'fav_icon',
        'logo',
        'description',
        'meta_description',
        'facebook',
        'youtube',
        'linkedin',
        'twitter',
        'privacy_policy',
        'about_us',
    ];
    


}
