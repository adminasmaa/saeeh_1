<?php


namespace App\Repositories\IRepositories\Vehicle;

use App\Repositories\IRepositories\IBaseRepository;

interface IVehicleTypeRepository extends IBaseRepository
{
    public function getAllByType($vType);
}
