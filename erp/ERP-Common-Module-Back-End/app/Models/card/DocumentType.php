<?php

namespace App\Models\card;

use App\Models\BaseModel;

class DocumentType extends BaseModel
{
    public $guarded = ['id'];
    protected $table ='c_document_types';

    // public function VehicleWheel()
    // {
    //     return $this->hasMany(VehicleWheel::class, 'vehicle_id');
    // }
    // public function counts ()
    // {
    //     return $this->VehicleWheel()->count();
    // }
}
