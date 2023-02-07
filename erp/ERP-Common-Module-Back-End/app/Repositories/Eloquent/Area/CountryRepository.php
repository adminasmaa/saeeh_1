<?php

namespace App\Repositories\Eloquent\Area;

use App\Models\Area\Country;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\IRepositories\Area\ICountryRepository;

class CountryRepository extends BaseRepository implements ICountryRepository
{
    public function model()
    {
        return Country::class;
    }

}

