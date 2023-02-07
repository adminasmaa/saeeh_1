<?php

namespace App\Repositories\Eloquent\Unit;

use App\Models\Unit\Unit;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\IRepositories\Unit\IUnitRepository;

class UnitRepository extends BaseRepository implements IUnitRepository
{
    public function model()
    {
        return Unit::class;
    }
}
