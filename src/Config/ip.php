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
    "ip_driver" => "ipapi",

    "drivers" =>[
        "ipinfo" =>[
            "api_token" => '13cf1a11478776'
        ],
        "ipapi" =>[
            "api_token" => "e69a645642003dbbf91091f0d6edd514"
        ]
    ]
];
