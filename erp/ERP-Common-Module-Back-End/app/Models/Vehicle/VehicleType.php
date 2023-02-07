<?php

namespace App\Models\Vehicle;

use App\Models\BaseModel;
use Database\Factories\Vehicle\VehicleTypeFactory;


class VehicleType extends BaseModel
{

    protected $table = 'c_vehicle_types';
    protected $fillable = ['name_ar', 'name_en', 'code', 'vtype', 'is_active'];


    protected static function newFactory()
    {
        return VehicleTypeFactory::new();
    }

    public function vehicleData()
    {
        return $this->hasMany(VehicleData::class);
    }

   
}
