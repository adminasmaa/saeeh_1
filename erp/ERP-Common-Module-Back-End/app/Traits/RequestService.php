<?php

namespace App\Traits;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Cache\RateLimiter;
use GuzzleHttp\Exception\ServerException;

trait RequestService
{
    public function request($method, $requestUrl, $formParams = [], $headers = [])
    {
//        $headers['Accept'] = 'application/json';
//        $headers['Content-Type'] = 'application/json';
        $limiter = app(RateLimiter::class);
        $actionKey = $this->serviceName;
        $threshold = 5;
        try {
            if ($limiter->tooManyAttempts($actionKey, $threshold)) {
                return response()->json(['error' => 'Too many Attempt'], 404);
            }
            try {
//                $serviceJob = new \App\Jobs\RequestService($this->baseUri,$this->secret,$method,$requestUrl,$formParams,$headers);
//                dispatch($serviceJob);
                $client = new Client([
                    'base_uri' => $this->baseUri
                ]);

                if (isset($this->secret)) {
                    $headers['Authorization'] = $this->secret;
                }
                $response = $client->request($method, $requestUrl,
                    [
                        'timeout' => 15,
                        'form_params' => $formParams,
                        'headers' => $headers
                    ]
                );
                return $response->getBody()->getContents();
            } catch (ServerException $e) {
                return $e->getResponse()->getBody()->getContents();
//                return $e->getMessage() ;

            }
        } catch (\Exception $exception) {
//            $limiter->hit($actionKey, Carbon::now()->addMinutes(15));
//            return response()->json(['error' => 'Service Not found'], 404);
            return $exception->getResponse() ? $exception->getResponse()->getBody()->getContents() : response()->json(['error' => 'Service Not found'], 404);

//            return $exception->getMessage();
        }
    }
}
