# Laravel IP  
a package for find location by IP address 🚀  
## installation  
you can install this package via Composer :   
```bash  
composer require hamidreza2005/laravel-ip  
```  
and after installation use this command to publish configs :   
```bash  
php artisan vendor:publish --tag=laravel-ip  
```  
## Configuration  
  
for configure this package go to `config/ip.php` and choose your driver  
```php  
<?php    
    
return [    
   /*    
   |--------------------------------------------------------------------------    
   | Ip Driver    
   |--------------------------------------------------------------------------    
   |    
   | Here is where you can choose your driver for getting location from ip    
   | Supported :    
   |   "ipinfo" => visit https://www.ipinfo.io,    
   |   "ipapi" => visit https://www.ipapi.com,    
   |   "geojs" => visit https://www.geojs.io/    
   | Suggested : "geojs"    
   |    
   */  
    "ip_driver" => "geojs",    
   ...  
  ];  
```  
and place your driver's API token   
```php  
<?php     
return [   
   ...  
   "drivers" =>[    
     "ipinfo" =>[    
        "api_token" => 'YOUR_API_KEY'    
     ],    
     "ipapi" =>[    
        "api_token" => "YOUR_API_KEY"    
     ]    
 ]];  
```  
**Notice :** if you Choose "geojs" driver you don't need to have API token.  
  
## Usage  
```php  
use hamidreza2005\laravelIp\Facades\Ip;  
  
Route::get('/', function () {    
  return IP::countryCode();    
});  
```  
will return following string :  
```  
DE  
```  
and you can use other methods :  
```php  
IP::countryCode(); // return country Code e.g DE  
IP::all(); // return all Details about client's ip  
IP::coordinates(); // return client's coordinates  
IP::ip(); // return all client's ip  
IP::country(); // return all client's country full name e.g Germany
// Or you can use helper function
ip()->country();
ip("coountry"); // Both of them are true  
```  
**Notice :** because of every driver have different Structure you should use all method to access Details about IP  
### Get Location from custom IP
if you want to get location from a custom ip you can use $ip parameter:
```php
IP::all("8.8.8.8")
```
above command get location from ip `8.8.8.8` and have following result:
```json
{
  "organization_name": "GOOGLE",
  "accuracy": 1000,
  "asn": 15169,
  "organization": "AS15169 GOOGLE",
  "timezone": "America/Chicago",
  "longitude": "-97.822",
  "country_code3": "USA",
  "area_code": "0",
  "ip": "8.8.8.8",
  "country": "United States",
  "continent_code": "NA",
  "country_code": "US",
  "latitude": "37.751"
}
```
### Get Country fullname in ipinfo driver
as you know there is not country fullname in ipinfo structure. so if want to use ipinfo driver and you want country fullname `e.g France` you can make a json file where you like and write this code in `config/ip.php` :
```php
<?php
return [
	...
	"drivers" =>[  
        "ipinfo" =>[  
            "api_token" => "YOUR_API_TOKEN",  
            "full_country_name_path" => storage_path('default.json')  
		  ]
	 ],  
	 ...
];
```
and for example  `default.json` file must be like this :
```json
{   
  "US": "United State",  
  "DE": "Germany"
}
``` 
Now you can get country fullname by `IP::country()` in ipinfo driver
## Block Client by Ip  
if you want to block client by ip or something like this you have to add this middleware to `app/Http/kernel.php` :  
```php  
protected $middleware = [    
   ...  
   \hamidreza2005\laravelIp\Middleware\laravelIp::class,  
   ...  
];  
```  
and choose which ips or countries is in blacklist or whitelist in `config/ip.php`:  
```php  
<?php  
return [  
   ...  
   "blocking"=>[    
        /*    
       * The values in this array won't access to website   
       */   
        "blacklist"=>[    
           "countryCode"=>["NK"],    
           "ip"=>["5.61.44.90"],  
           "coordinates" =>[[1.2.3.4,45.5.8.9]]    
       ],    
       /*    
       * only The values in this array can access to website   
       */  
       "whitelist"=>[    
//                  "countryCode"=>["US"]    
        ]    
    ]  
   ...  
];  
```  
## License  
  
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.  
  
--------------------  
  
### :raising_hand: Contributing  
If you find an issue, or have a better way to do something, feel free to open an issue , or a pull request.  
  
### :exclamation: Security  
If you discover any security related issues, please email `h.r.hassani@outlook.com` instead of using the issue tracker.
