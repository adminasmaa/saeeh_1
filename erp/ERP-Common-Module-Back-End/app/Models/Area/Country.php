<?php

namespace App\Models\Area;

use App\Models\BaseModel;
use Database\Factories\Area\CountryFactory;

class Country extends BaseModel
{
    public $translatable = ['name'];
    protected $table = 'c_countries';
    protected $fillable = [
        'code',
        'name_en',
        'name_ar',
        'is_active',

    ];

    protected static function newFactory()
    {
        return CountryFactory::new();
    }

}
