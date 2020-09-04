<?php
namespace hamidreza2005\laravelIp\Drivers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

abstract class DriverAbstract
{
    protected $location;

    protected $ip;

    /**
     * Driver constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setIp();
    }
    /**
     * Get Client's Ip
     * @return string
     * @throws \Exception
     */
    public function ip():string
    {
        return $this->ip;
    }

    /**
     * Get Ip Property
     * @return void
     * @param mixed $ip
     */
    public function setIp($ip = null):void
    {
        if (!is_null($ip)){
            $this->ip = $ip;
            $this->setLocation();
            return;
        }
        if (config('app.debug')){
            $this->ip = $this->getClientIpInDebugMode();
            $this->setLocation();
            return;
        }
        $this->ip = request()->ip();
        $this->setLocation();
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
        return collect([$this->location->get('latitude'),$this->location->get('longitude')]);
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

    public function country()
    {
        return $this->location->get('country');
    }

    /**
     * Set Location
     * @throws \Exception
     * @return void
     */
    abstract public function setLocation();
}
