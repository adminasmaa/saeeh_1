<?php

namespace App\Services;

use App\Http\Services\ServiceBase;

class ExampleService extends ServiceBase
{

    public function __construct()
    {
        $this->serviceName = config('services.example.service_name');
        $this->baseUri = config('services.example.base_uri');
        $this->secret = config('services.example.secret');
        $this->url = "/api/examples/";
    }

    public function getWarehouseName($data)
    {
        return $this->request('GET', $this->url, $data);
    }


}

