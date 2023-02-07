<?php

namespace App\Repositories\Eloquent\Localization;

use App\Models\Localization\District;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\IRepositories\Localization\IDistrictRepository;

class DistrictRepository extends BaseRepository implements IDistrictRepository
{
    public function model()
    {
        return District::class;
    }
}
