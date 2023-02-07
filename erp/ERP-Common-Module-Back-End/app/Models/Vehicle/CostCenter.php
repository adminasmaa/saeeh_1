<?php

namespace App\Models\Vehicle;

use App\Models\BaseModel;




class CostCenter extends BaseModel
{

    protected $table = 'temp_cost_centers';
    protected $fillable = ['name_ar', 'name_en', 'code'];
}
