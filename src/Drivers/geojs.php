<?php
namespace hamidreza2005\laravelIp\Drivers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class geojs extends DriverAbstract
{
    const URL = 'https://get.geojs.io/v1/ip/geo/';

    /**
     * geojs constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $response = Http::get(self::URL.$this->ip().'.json');
        if ($response->failed()){
            throw new \Exception($response);
        }
        $this->location = collect($response->json());
    }
}
