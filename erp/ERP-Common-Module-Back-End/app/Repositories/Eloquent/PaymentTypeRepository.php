<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\payment\PaymentType;
use App\Repositories\IRepositories\IPaymentTypeRepository;


class PaymentTypeRepository extends BaseRepository implements IPaymentTypeRepository
{
    public function model()
    {
        return PaymentType::class;
    }
}
