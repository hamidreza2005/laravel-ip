<?php
namespace hamidreza2005\laravelIp\Drivers;



use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ipinfo extends DriverAbstract
{
    const URL = 'https://www.ipinfo.io/';

    public function countryCode()
    {
        return $this->location->get('country');
    }

    public function coordinates():Collection
    {
        return collect(explode(',',$this->location->get('loc')));
    }

    public function country()
    {
        $json_file_path = config("ip.drivers.ipinfo.full_country_name_path");
        if (is_null($json_file_path)){
            return $this->countryCode();
        }
        $fullnames = (array) json_decode(file_get_contents($json_file_path));
        return $fullnames[$this->countryCode()] ?? $this->countryCode();
    }

    /**
     * Set Location
     * @return void
     * @throws \Exception
     */
    public function setLocation()
    {
        parent::setLocation();
        $token = config('ip.drivers.ipinfo.api_token');
        $response = Http::withHeaders(["Accept"=>"application/json"])->get(static::URL.$this->ip()."?token=$token");
        if ($response->failed()){
            throw new \Exception($response->json());
        }
        $location = collect($response->json());
        if (config("ip.caching")){
            Cache::put("location_".$this->ip(),$location,now()->addWeek());
        }
        $this->location = collect($response->json());
    }
}
