<?php
namespace hamidreza2005\laravelIp\Drivers;


use Illuminate\Support\Facades\Http;

class ipapi extends DriverAbstract
{

    const URL = "http://api.ipapi.com/";
    /**
     * ipapi constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setIp();
        $this->setLocation();
    }

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
        $token = config('ip.drivers.ipapi.api_token');
        $response = Http::get(self::URL.$this->ip()."?access_key=$token&security=1:wq");
        if ($response->failed()){
            throw new \Exception($response->json()['error']['info']);
        }
        $this->location = collect($response->json());
    }
}
