<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Service Secret
    |--------------------------------------------------------------------------
    |
    | This value is the key of your service. This value is used when the
    | another service or app needs to use this service
    |
    */
    'service_name' => env('SERVICE_NAME', 'academic_year'),
    'service_version' => env('SERVICE_VERSION', 'v1'),
    'service_secret' => env('SERVICE_SECRET', 'service_007'),
];
