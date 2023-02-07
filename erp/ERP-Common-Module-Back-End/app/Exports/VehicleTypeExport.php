<?php

namespace App\Exports;

use App\Models\Vehicle\VehicleType;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class VehicleTypeExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $vehicleTypes = VehicleType::get();
        return $vehicleTypes->map(function($item){
             return[
                'id' => $item->id,
                'name_en' => $item->name_en,
                'name_ar' => $item->name_ar,
             ];
        });
    }
    public function headings(): array
    {
        return [
            '#',
            'name_en',
            'name_ar'


        ];
    }
}
