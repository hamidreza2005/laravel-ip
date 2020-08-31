<?php
namespace hamidreza2005\laravelIp;


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
               break;
           case "ipinfo":
               break;
           default:
               throw new \Exception("Unknown Driver");
       }
    }
}
