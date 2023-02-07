<?php

namespace App\Models\Area;

use App\Models\BaseModel;
use Database\Factories\Area\RegionFactory;

class Region extends BaseModel
{
    public $translatable = ['name'];
    protected $table = 'c_regions';
    protected $fillable = [
        'code',
        'name_en',
        'name_ar',
        'is_active',
    ];

    protected static function newFactory()
    {
        return RegionFactory::new();
    }

}
