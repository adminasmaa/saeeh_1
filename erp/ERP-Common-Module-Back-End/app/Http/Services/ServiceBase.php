<?php

namespace App\Http\Services;

use App\Traits\RequestService;

class ServiceBase
{
    use RequestService;

    public $serviceName;
    public $baseUri;
    public $secret;
    public $url;

    public function __construct()
    {
    }

    public function fetchAll($data = null)
    {
        return $this->request('GET', $this->url, $data);
    }

    public function fetch($obj)
    {
        return $this->request('GET', $this->url . $obj);
    }

    public function create($data)
    {
        return $this->request('POST', $this->url, $data);
    }

    public function update($obj,$data)
    {
        return $this->request('PATCH', $this->url . $obj, $data);
    }

    public function delete($obj)
    {
        return $this->request('DELETE', $this->url . $obj);
    }
}
