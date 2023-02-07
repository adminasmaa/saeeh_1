<?php

namespace App\Models\Currency;

use App\Models\BaseModel;

class Currency extends BaseModel
{

    protected $table = 'c_currencies';
    protected $fillable = ['name_ar', 'name_en', 'code','symbol','part_name_ar','part_name_en','is_active'];

    protected $with= ['currencyExchange','currencyPart'];
    
    public function currencyPart()
    {
        return $this->hasMany(CurrencyPart::class,'currency_id');
    }

    public function currencyExchange()
    {
        return $this->hasMany(CurrencyExchange::class,'from_currency_id');
    }

}

