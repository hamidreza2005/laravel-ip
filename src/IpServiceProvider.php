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
    }

    public function boot()
    {

    }
}
