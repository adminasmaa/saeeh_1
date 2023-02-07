<?php


namespace App\Repositories\IRepositories\Vehicle;

use App\Repositories\IRepositories\IBaseRepository;

interface IVehicleDataRepository extends IBaseRepository
{
    public function getAllByType($vtype);
    //public function updateVehicle(array $data, $id, $attribute = "id");

   
}
