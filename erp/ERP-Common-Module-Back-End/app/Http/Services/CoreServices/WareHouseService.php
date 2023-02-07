<?php

namespace App\Services;

use App\Http\Services\ServiceBase;

class WareHouseService extends ServiceBase
{

    public function __construct()
    {
        $this->serviceName = config('services.core.service_name');
        $this->baseUri = config('services.core.base_uri');
        $this->secret = config('services.core.base_uri');
        $this->url = "/api/examples/";
    }

    public function getWarehouseName($data)
    {
        return $this->request('GET', $this->url, $data);
    }


}

