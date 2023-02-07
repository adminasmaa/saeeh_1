<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\CarClassification\CarClassification;
use App\Repositories\IRepositories\ICarClassificationRepository;

class CarClassificationRepository extends BaseRepository implements ICarClassificationRepository
{
    public function model()
    {
        return CarClassification::class;
    }
}