<?php

namespace App\Models\Currency;

use App\Models\BaseModel;




class CurrencyPart extends BaseModel
{

    protected $table = 'c_currencies_parts';
    protected $fillable = ['name_ar', 'name_en', 'rate','currency_id','is_active'];
}
