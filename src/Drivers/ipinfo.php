<?php
namespace hamidreza2005\laravelIp\Drivers;



use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ipinfo extends DriverAbstract
{
    const URL = 'https://www.ipinfo.io/';

    /**
     * ipinfo constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $token = config('ip.drivers.ipinfo.api_token');
        $response = Http::withHeaders(["Accept"=>"application/json"])->get(static::URL.$this->ip()."?token=$token");
        if ($response->failed()){
            throw new \Exception($response->json());
        }
        $this->location = collect($response->json());
    }

}
