<?php
namespace hamidreza2005\laravelIp\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class Ip
 * @package hamidreza2005\laravelIp\Facades
 * @method static string ip()
 * @method static Collection all()
 * @method static Collection coordinates()
 * @method static string countryCode()
 * @method static string country()
 */
class IP extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "Ip";
    }
}
