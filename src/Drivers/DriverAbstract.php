<?php
namespace hamidreza2005\laravelIp\Drivers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

abstract class DriverAbstract
{
    protected $location;

    /**
     * Get Client's Ip
     * @return string
     * @throws \Exception
     */
    public function ip():string
    {
        if (config('app.debug')){
            return $this->getClientIpInDebugMode();
        }
        return request()->ip();
    }

    /**
     * Get all Details about client's location
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->location;
    }

    /**
     * Get client's Coordinates
     * @return Collection
     */
    public function coordinates():Collection
    {
        return collect([$this->location->get('longitude'),$this->location->get('longitude')]);
    }

    /**
     * Get client's CountryCode e.g US
     * @return Collection
     */
    public function countryCode()
    {
        return $this->location->get('country_code');
    }

    /**
     * Get Client ip if site is in Debug mode.
     * @throws \Exception
     * @return string
     */
    protected function getClientIpInDebugMode(){
        $res = Http::get("https://get.geojs.io/v1/ip.json");
        if (!$res->ok()){
            throw new \Exception($res->body());
        }
        return $res['ip'];
    }
}
