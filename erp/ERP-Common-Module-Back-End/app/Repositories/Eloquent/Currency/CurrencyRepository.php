<?php

namespace App\Repositories\Eloquent\Currency;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Currency\Currency;
use App\Repositories\IRepositories\Currency\ICurrencyRepository;

class CurrencyRepository extends BaseRepository implements ICurrencyRepository
{
    public function model()
    {
        return Currency::class;
    }



}