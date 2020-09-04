<?php
namespace hamidreza2005\laravelIp\Drivers;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ipapi extends DriverAbstract
{

    const URL = "http://api.ipapi.com/";

    public function country()
    {
        return $this->location->get('country_name');
    }

    /**
     * Set Location
     * @return void
     * @throws \Exception
     */
    public function setLocation()
    {
        parent::setLocation();
        $token = config('ip.drivers.ipapi.api_token');
        $response = Http::get(self::URL.$this->ip()."?access_key=$token&security=1:wq");
        if ($response->failed()){
            throw new \Exception($response->json()['error']['info']);
        }
        $location = collect($response->json());
        if (config("ip.caching")){
            Cache::put("location_".$this->ip(),$location,now()->addWeek());
        }
        $this->location = collect($response->json());
    }
}
