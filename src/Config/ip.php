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
    "ip_driver" => "ipinfo",

    "drivers" =>[
        "ipinfo" =>[
            "api_token" => env("IPINFO_API_TOKEN",""),
            "full_country_name_path" => storage_path('default.json')
        ],
        "ipapi" =>[
            "api_token" => env("IPAPI_API_TOKEN","")
        ]
    ],
    "blocking"=>[
        /*
       * The values in this array won't access to website
       */
        "blacklist"=>[
            "countryCode"=>["NK"],
            "ip"=>["5.61.44.90"],
            "coordinates" =>[["1.2.3.4","45.5.8.9"]],
		 ],
		 /*
		 * only The values in this array can access to website
		 */
		 "whitelist"=>[
//          "countryCode"=>["US"]
        ]
	 ]
];
