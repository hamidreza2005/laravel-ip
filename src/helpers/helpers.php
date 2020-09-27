<?php

if(!function_exists('ip')){
    function ip($property = null)
    {
        $ip = new \hamidreza2005\laravelIp\Ip();
        if (!is_null($property)) {
            return $ip->$property();
        }
        return $ip;
    }
}
