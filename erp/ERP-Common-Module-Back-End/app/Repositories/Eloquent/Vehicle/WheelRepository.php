<?php

namespace App\Repositories\Eloquent\Vehicle;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Vehicle\Wheel;
use App\Repositories\IRepositories\Vehicle\IWheelRepository;

class WheelRepository extends BaseRepository implements IWheelRepository
{
    public function model()
    {
        return Wheel::class;
    }

    public function getAllByType($vType)
    {
        return Wheel::where('vtype',$vType)->get();
    }

}