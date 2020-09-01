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

    "drivers" =>[
        "ipinfo" =>[
            "api_token" => env("IPINFO_API_TOKEN","")
        ],
        "ipapi" =>[
            "api_token" => env("IPAPI_API_TOKEN","")
        ]
    ],

    "blocking"=>[
        "blacklist"=>[
            "countryCode"=>["EN"],
            "ip"=>["5.61.44.90"]
        ],
        "whitelist"=>[
//            "countryCode"=>["IR"]
        ]
    ]
];
