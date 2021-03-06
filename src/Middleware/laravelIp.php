<?php
namespace hamidreza2005\laravelIp\Middleware;


use hamidreza2005\laravelIp\Facades\IP;

class laravelIp
{
    public function handle($request,\Closure $next)
    {
        $whitelist = config("ip.blocking.whitelist");
        /*
         * Check if white list is empty
         */
        if (!empty($whitelist)){
            /*
             * Check if client's ip is in whitelist
             */
            for ($i=0;$i<=count($whitelist);$i++){
                $key = array_keys($whitelist)[$i];
                if (in_array(IP::$key(),$whitelist[$i]))
                    return $next($request);
                if($i === count($whitelist))
                    return abort(403);
            }
        }
        /*
         * Check if client's ip is in blacklist
         */
        foreach (config("ip.blocking.blacklist") as $key => $value){
            if (in_array(IP::$key(),$value))
                return abort(403);
        }
        return $next($request);
    }
}
