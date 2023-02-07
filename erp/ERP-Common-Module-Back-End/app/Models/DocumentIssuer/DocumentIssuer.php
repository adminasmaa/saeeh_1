<?php

namespace App\Models\DocumentIssuer;


use App\Models\BaseModel;

class DocumentIssuer extends BaseModel
{


    protected $table = "c_document_issuer";



    protected $fillable = [
        'name_ar','name_en', 'code', 'is_active'
    ];

    public function vehicleDocuments()
    {
        return $this->hasMany(VehicleDocument::class);
    }

    public function counts()
    {
        
        return $this->vehicleDocuments()->count();
    }
}
