<?php

namespace App\Models\Vehicle;

use App\Models\BaseModel;



class Account extends BaseModel
{
    protected $table = 'temp_accounts';
    protected $fillable = ['name_ar', 'name_en', 'code'];
}
