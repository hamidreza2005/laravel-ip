<?php
namespace hamidreza2005\laravelIp\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class Ip
 * @package hamidreza2005\laravelIp\Facades
 * @method static string ip(string $ip)
 * @method static Collection all(string $ip)
 * @method static Collection coordinates(string $ip)
 * @method static string countryCode(string $ip)
 * @method static string country(string $ip)
 */
class IP extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "Ip";
    }
}
