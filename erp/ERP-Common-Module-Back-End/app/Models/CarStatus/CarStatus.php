<?php

namespace App\Models\CarStatus;


use App\Models\BaseModel;

class CarStatus extends BaseModel
{


    protected $table = "c_car_status";



    protected $fillable = [
        'name_ar','name_en', 'code', 'is_active'
    ];

}
