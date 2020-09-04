<?php
namespace hamidreza2005\laravelIp\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class Ip
 * @package hamidreza2005\laravelIp\Facades
 * @method static string ip(string $ip=null)
 * @method static Collection all(string $ip=null)
 * @method static Collection coordinates(string $ip=null)
 * @method static string countryCode(string $ip=null)
 * @method static string country(string $ip=null)
 */
class IP extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "Ip";
    }
}
