<?php
namespace hamidreza2005\laravelIp\Drivers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class geojs extends DriverAbstract
{
    const URL = 'https://get.geojs.io/v1/ip/geo/';

    /**
     * Set Location
     * @return void
     * @throws \Exception
     */
    public function setLocation()
    {
        parent::setLocation();
        $response = Http::get(self::URL.$this->ip().'.json');
        if ($response->failed()){
            throw new \Exception($response);
        }
        $location = collect($response->json());
        if (config("ip.caching")){
            Cache::put("location_".$this->ip(),$location,now()->addWeek());
        }
        $this->location = $location;
    }
}
