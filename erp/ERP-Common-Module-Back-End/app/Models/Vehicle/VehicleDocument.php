<?php

namespace App\Models\Vehicle;

use App\Models\BaseModel;
use App\Models\card\DocumentType;

class VehicleDocument extends BaseModel
{

    protected $table = 'c_vehicle_documents';

    protected $fillable = ["doc_serial", "start_date", "end_date", "notes", "value", "document_type_id", "document_issuer_id", "vehicle_data_id"];

    public function documentIssuer()
    {
        return $this->belongsTo(DocumentIssuer::class, 'document_issuer_id');
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id');
    }
}
