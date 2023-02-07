<?php

namespace App\Repositories\Eloquent\Area;

use App\Models\Area\Region;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\IRepositories\Area\IRegionRepository;

class RegionRepository extends BaseRepository implements IRegionRepository
{
    public function model()
    {
        return Region::class;
    }
}

