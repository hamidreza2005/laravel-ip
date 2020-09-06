<?php
namespace hamidreza2005\laravelIp;


use hamidreza2005\laravelIp\Drivers\Geojs;
use hamidreza2005\laravelIp\Drivers\Ipapi;
use hamidreza2005\laravelIp\Drivers\Ipinfo;

class Ip
{
    /**
     * IP Driver
     */
    private $driver;

    /**
     * Ip constructor.
     * @throws \Exception
     */
    public function __construct()
    {
       switch (config('ip.ip_driver')){
           case 'geojs':
               $this->driver =  new Geojs();
               break;
           case "ipinfo":
               $this->driver =  new Ipinfo();
               break;
           case "ipapi":
               $this->driver = new Ipapi();
               break;
           default:
               throw new \Exception("Unknown Driver");
       }
    }

    public function __call($method,$options)
    {
        if (isset($options[0])){
            $this->driver->setIp($options[0]);
        }
        return $this->driver->$method($options);
    }
}
