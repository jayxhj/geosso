<?php

return [
    'sso_url'     => env('sso_url', 'http://api.geotmt.com/sso'),
    'sso_service' => env('sso_service', 'Geo\Ana\Engine\SsoService'),
    'app_id'      => env('app_id', 1),
    'app_name'    => env('app_name', '应用1'),
    'sync_url'    => env('sync_url', 'http://app1.geotmt.com/sso'),
    'sso_key'     => env('sso_key',
        'eyJpdiI6InBZWjlXRHpYM0JjUlRUb3gzck9ETmc9PSIsInZhbHVlIjoiMTdvalFUWVJqMUVsNFcwZjRyRVAwQT09IiwibWFjIjoiZmNlY2IzZWZkMDNjMDVmNjQwYmQyYWUzNDU3YWZkMDFiODg3OTc4NjQwNGM4MDY3OGRmZmZjYzBkNmE4ODRmYiJ9'),
    'time_zone'   => env('APP_TIMEZONE', 'Asia/Shanghai'),
];
