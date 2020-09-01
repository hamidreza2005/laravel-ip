<?php
namespace hamidreza2005\laravelIp;


use hamidreza2005\laravelIp\Drivers\geojs;
use hamidreza2005\laravelIp\Drivers\ipinfo;

class Ip
{
    /**
     * IP Driver
     */
    protected $driver;

    /**
     * Ip constructor.
     * @throws \Exception
     */
    public function __construct()
    {
       switch (config('ip.ip_driver')){
           case 'geojs':
               $this->driver =  new geojs();
               break;
           case "ipinfo":
               $this->driver =  new ipinfo();
               break;
           default:
               throw new \Exception("Unknown Driver");
       }
    }

    public function __call($method,$options)
    {
        return $this->driver->$method($options);
    }
}
