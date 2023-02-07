<?php

namespace App\Repositories\Eloquent;

use App\Models\CarStatus\CarStatus;
use App\Repositories\IRepositories\ICarStatusRepository;

class CarStatusRepository extends BaseRepository implements ICarStatusRepository
{
    public function model()
    {
        return CarStatus::class;
    }
}
