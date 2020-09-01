# Laravel IP
this package helps you to find client's location by IP address 🚀
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
**Notice :**  if you Choose "geojs" driver you don't need to have API token.

## Usage
```php
use hamidreza2005\laravelIp\Facades\Ip;

Route::get('/', function () {  
  return Ip::countryCode();  
});
```
will return following string :
```
DE
```
and you can use other methods :
```php
Ip::countryCode() // return country Code e.g DE
Ip::all() // return all Details about client's ip
Ip::coordinates() // return client's coordinates
Ip::ip() // return all client's ip
```
**Notice :** because of every driver have different Structure you should use all method to access Details about IP
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

--------------------

### :raising_hand: Contributing
If you find an issue, or have a better way to do something, feel free to open an issue , or a pull request.

### :exclamation: Security
If you discover any security related issues, please email `h.r.hassani@outlook.com` instead of using the issue tracker.
