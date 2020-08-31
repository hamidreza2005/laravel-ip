<?php
namespace hamidreza2005\laravelIp;

use Illuminate\Support\ServiceProvider;

class IpServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind("Ip",function (){
            return new Ip();
        });

        $this->mergeConfigFrom(__DIR__.'/Config/ip.php','ip');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/ip.php'=>config_path('ip.php')
        ],'laravel-ip');
    }
}
