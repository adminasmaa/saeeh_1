<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Example;
use App\Repositories\IRepositories\IExampleRepository;

class ExampleRepository extends BaseRepository implements IExampleRepository
{
    public function model()
    {
        return Example::class;
    }
}