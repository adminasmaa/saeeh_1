<?php

namespace App\Models\payment;

use App\Models\BaseModel;
use App\Models\Vehicle\Account;

class PaymentType extends  BaseModel
{
    public $guarded = ['id'];
    protected $table ='c_payment_types';

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
