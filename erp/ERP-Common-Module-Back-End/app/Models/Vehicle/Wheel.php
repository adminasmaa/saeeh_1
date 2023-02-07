<?php

namespace App\Models\Vehicle;

use App\Models\BaseModel;
use Database\Factories\Vehicle\WheelFactory;


class Wheel extends BaseModel
{

    protected $table = 'c_wheels';
    protected $fillable = ['name_ar', 'name_en', 'code', 'vtype', 'is_active'];
   
    protected static function newFactory()
    {
        return WheelFactory::new();
    }

    public function vehicleWheels()
    {
        return $this->hasMany(VehicleWheel::class,'wheel_id');
    }

   
}
