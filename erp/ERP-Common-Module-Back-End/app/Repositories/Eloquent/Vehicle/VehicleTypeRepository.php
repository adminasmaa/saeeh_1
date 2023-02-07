<?php

namespace App\Repositories\Eloquent\Vehicle;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Vehicle\VehicleType;
use App\Repositories\IRepositories\Vehicle\IVehicleTypeRepository;

class VehicleTypeRepository extends BaseRepository implements IVehicleTypeRepository
{
    public function model()
    {
        return VehicleType::class;
    }

    public function getAllByType($vType)
    {
        return VehicleType::where('vtype',$vType)->get();
    }

}