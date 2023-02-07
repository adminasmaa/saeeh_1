<?php

namespace App\Models\CarClassification;

use App\Models\BaseModel;

class CarClassification extends BaseModel
{


    protected $table = "c_vehicle_classifications";



    protected $fillable = [
        'name_ar', 'name_en', 'code', 'is_active'
    ];
}
