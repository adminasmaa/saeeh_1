<?php

namespace App\Repositories\Eloquent\Vehicle;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Vehicle\VehicleData;
use App\Repositories\IRepositories\Vehicle\IVehicleDataRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class VehicleDataRepository extends BaseRepository implements IVehicleDataRepository
{
    public function model()
    {
        return VehicleData::class;
    }

    public function getAllByType($vtype)
    {
        return VehicleData::where('vtype',$vtype)->get();
    }

        /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    // public function updateVehicle(array $data, $id, $attribute = "id")
    // {

    //     $filter= Arr::except($data, ['cards']);
    // //   $filterData=$data['cards'];
    // //     $filterData = collect($data)->filter(function ($item) {
    // //         return !is_array($item);
    // //     })->toArray();
    // // //    // 
    // //dd($filter);
    // $this->model->where($attribute, '=', $id)->update($filter);
    //     if ($data['cards']) {
    //         foreach ($data['cards'] as $da) {
    //             $this->model->where($attribute, '=', $id)->VehicleDocument->updateOrCreate([
    //                      'id' => (isset($da['id']) ? $da['id'] : null)],
    //                          $da);  
    //                     }
    //         }
    //         // return $this->model->where($attribute, '=', $id)->update($data);
    //         return "ok";
    // }

}